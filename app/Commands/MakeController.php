<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MakeController extends BaseCommand
{
	protected $group       = 'mggroup';
	protected $name        = 'make:controller';
	protected $description = 'Create controller using command.';
	protected $contollerPath = APPPATH . 'Controllers';

	public function showHelp()
	{
		CLI::write('Description:');
		CLI::write('   ' . $this->description);
		CLI::write('');
		CLI::write('Usage:');
		CLI::write('   php spark make:controller ControllerName');
		CLI::write('');
		CLI::write('For more refer this link https://github.com/maulikgushani/Codeigniter4-Command');
	}

	public function run(array $params)
	{
		try {
			if(isset($params[0])) {
				if(!file_exists($this->contollerPath . '/' . $params[0] . '.php')) {
					$myfile = fopen($this->contollerPath . '/'.$params[0].'.php', "w");
					$contents = file_get_contents(APPPATH.'../writable/mgdemofiles/DemoController.php');
					$contents = str_replace('@:@', $params[0], $contents);
					fwrite($myfile, $contents);
					fclose($myfile);
					CLI::write($params[0] . ' controller created.');
				} else {
					throw new \Exception($params[0] . ' controller already exists.');
				}
			} else {
				throw new \Exception("Controller name is not entered.");
			}
		} catch(\Exception $e) {
			CLI::write($e->getMessage());
		}
	}
}