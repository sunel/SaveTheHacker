<?php namespace App\Console\Commands;

use File;
use App\CaseMatch;
use App\CaseDetail;
use Illuminate\Console\Command;
use mikehaertl\shellcommand\Command as ShellCmd;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RunCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'face:run';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run the CBI.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$instagram = $this->getInstagram();

		

		foreach ($instagram as $details) {
			
			$timestamp = time();

			$destinationPath = storage_path().'/uploads/temp/'.$timestamp;
			if (!File::isDirectory($destinationPath)) {
				File::makeDirectory($destinationPath, 0777, true);
				copy($details['url'], $destinationPath.'/'.$timestamp.'.jpg');
			}

			$this->call('face:detect', ['file' => $destinationPath.'/'.$timestamp.'.jpg' , 'id' => $timestamp]);

			$destinationPath = storage_path().'/uploads/temp/'.$timestamp.'/crop';
			if (File::isDirectory($destinationPath)) {
				foreach (Finder::create()->files()->name('*.jpg')->in($destinationPath) as $file) {
					
					$collection  = CaseDetail::all();
					$collection->each(function($case) use($file,$details)
				    {	
				    	$signature1 = puzzle_fill_cvec_from_file($case->photo_url);
						$signature2 = puzzle_fill_cvec_from_file($file->getRealpath());
						$d = puzzle_vector_normalized_distance($signature1, $signature2);
						if ($d < PUZZLE_CVEC_SIMILARITY_THRESHOLD) {

							$caseFound = \DB::table('case_match_details')
								->where('case_detail_id', $case->id)
								->where('photo_id', $details['id'])
								->get();
							if(!count($caseFound)){
								$data = [
									'case_detail_id'=>$case->id,
									'image_url' => $details['url'],
									'data' => json_encode($details),
									'photo_id' => $details['id'],
									'similarity' => $d,
								];
							  	CaseMatch::create($data);
							  	unset($data);	
							}
							unset($caseFound);	
						}
						unset($signature1,$signature2,$d);
				   
				    });	
				    unset($collection,$file);
					
				}

			}
			
		}
		$this->call('face:delete', []);
	}

	protected function getInstagram()
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

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			
		];
	}

}
