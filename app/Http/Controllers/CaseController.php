<?php namespace App\Http\Controllers;

use File;
use Image;
use App\CaseDetail;
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

		return view('search',compact('id'));
	}

	public function getCaseId($id)
	{
		return view('search',compact('id'));
	}

	public function getFliker()
	{
		$client = new \GuzzleHttp\Client();

		$response = $client->get('https://api.instagram.com/v1/users/self/feed?access_token=361859527.1fb234f.79fd4c8cf5c14856ae9ca6fd75f802d5');

		dd($res->getBody());
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

                return redirect()->back();
            }
        }

        return redirect()->back()->withErrors($validator->errors());
	}
}
