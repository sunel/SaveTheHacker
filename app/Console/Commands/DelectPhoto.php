<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use mikehaertl\shellcommand\Command as ShellCmd;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DelectPhoto extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'face:delete';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Remove Temp Data.';

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
		$cmd = 'rm -rf '.storage_path().'/uploads/temp/'
		$command = new ShellCmd($cmd);
		if (!$command->execute()) {
			Log::info($command->getError());
		}
		//rm -rf /usr/share/home/hack/storage/uploads/temp/
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
