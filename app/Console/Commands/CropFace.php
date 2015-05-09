<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use mikehaertl\shellcommand\Command as ShellCmd;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CropFace extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'face:detect';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Crop the Image.';

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
		$file = $this->argument('file');
		
		$cmd = 'python /usr/share/home/FaceDetect/face_detect.py '.$file.' /usr/share/home/FaceDetect/haarcascade_frontalface_default.xml';
		$command = new ShellCmd($cmd);
		if ($command->execute()) {
		    echo $command->getOutput();
		} else {
		    echo $command->getError();
		    $exitCode = $command->getExitCode();
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['file', InputArgument::REQUIRED, 'File to crop.'],
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
