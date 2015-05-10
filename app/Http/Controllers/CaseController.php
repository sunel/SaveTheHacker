<?php namespace App\Http\Controllers;

use File;
use Image;
use Artisan;
use App\CaseDetail;
use App\CaseMatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CaseController extends Controller {

	public function addCase(Request $request)
	{
		$input = $request->only('name', 'email');

		$input['case_number'] = uniqid('CASE');

		$validator = Validator::make(
		    $input,
		    [
		    	'name' => 'required',
		    	'email' => 'required'
		    ]
		);	
		if ($validator->fails())
		{
		    return redirect()->back()->withErrors($validator->errors());
		}

		$case = CaseDetail::create($input);

		return redirect()->route('search.post.id',[$input['case_number']]);

	}

	public function getCase(Request $request)
	{
		$id = $request->input('id');

		$case = $this->getCaseDetails($id);

		$matches = $this->getMatchedCase($case);

		return view('search',compact('id','case','matches'));
	}

	public function getCaseId($id)
	{
		$case = $this->getCaseDetails($id);

		$matches = $this->getMatchedCase($case);

		return view('search',compact('id','case','matches'));
	}

	protected function getMatchedCase($case)
	{
		if(!$case->id){
			return [];
		}
		return CaseMatch::where('case_detail_id', $case->id)->orderBy('similarity')->get();
	}

	protected function getCaseDetails($id)
	{

		 return CaseDetail::where('case_number','=',$id)->firstOrFail();
		
	}

	public function runFinder(Request $request){
		
		Artisan::queue('face:compare');

		return $request->input('hub_challenge');
	}

	public function getFliker()
	{
		$client = new \GuzzleHttp\Client();

		$response = $client->get('https://api.instagram.com/v1/users/self/feed?access_token=361859527.1fb234f.79fd4c8cf5c14856ae9ca6fd75f802d5');

		$jsonArray = $response->json();

		$finalData = [];
		foreach ($jsonArray['data'] as $data ) {
			if($url = array_get($data,'images.standard_resolution.url',false)){
				$finalData[] = [
				 	'url' => $url,
				 	'org' => array_get($data,'link',false),
				 	'id'  => array_get($data,'id',false),
				 	'location'  => array_get($data,'location',false),
				 	'user' => array_get($data,'user',false),
				];
			}
		}
		
		return $finalData;

	}

	public function addPhoto(Request $request,$id)
	{
		$file = array('image' => $request->file('photo'));
        $rules = array('image' => 'required');
        $validator = Validator::make($file, $rules);
        if (!$validator->fails() && $request->file('photo')->isValid()) {
            
            $input = $request->file('photo');

            $destinationPath = storage_path().'/uploads/'.$id.'/profile';

	        if (!File::isDirectory($destinationPath)) {
	            File::makeDirectory($destinationPath, 0775, true);
	        }

	        $image = Image::make($input)->save($destinationPath.'/photo.jpg');

        	if ($image->filesize()) {
        		$case = $this->getCaseDetails($id);
        		$case->photo_url = $destinationPath.'/photo.jpg';
        		$case->save();
                return redirect()->back();
            }
        }

        return redirect()->back()->withErrors($validator->errors());
	}

	/**
     * @return Illuminate\Http\Response
     */
    public function getImage($id)
    {
        $filename = storage_path().'/uploads/'.$id.'/profile/photo.jpg';

        if (\File::isFile($filename)) {
            $img = Image::make($filename);
        } else {
            $img = Image::canvas(600, 600, '#fffffff');
        }

        // create response and add encoded image data
        $response = \Response::make($img->encode('jpg'));

        // set content-type
        $response->header('Content-Type', 'image/jpg');

        // output
        return $response;
    }
}
