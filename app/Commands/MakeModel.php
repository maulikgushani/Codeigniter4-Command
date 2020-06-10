<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class MakeModel extends BaseCommand
{
	protected $group       = 'mggroup';
	protected $name        = 'make:model';
	protected $description = 'Create model using command.';
	protected $modelPath = APPPATH . 'Models';

	public function showHelp()
	{
		CLI::write('Description:');
		CLI::write('   ' . $this->description);
		CLI::write('');
		CLI::write('Usage:');
		CLI::write('   php spark make:model ModelName');
		CLI::write('');
		CLI::write('Option:');
		CLI::write('   table       Option for table name.');
		CLI::write('   primary     Option for add primary key.');
		CLI::write('');
		CLI::write('For more refer this link https://github.com/maulikgushani/Codeigniter4-Command');
	}

	public function run(array $params)
	{
		try {
			if(isset($params[0])) {
				if(!file_exists($this->modelPath . '/' . $params[0] . '.php')) {
					$_myfile = fopen($this->modelPath . '/'.$params[0].'.php', "w");
					$_contents = file_get_contents(APPPATH.'../writable/mgdemofiles/DemoModel.php');
					$_contents = str_replace('@:@', $params[0], $_contents);
					$_mname = $params[0];
					$params = array_values($params);
					$_table = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $params[0]));					
					unset($params[0]);
					if(count($params) > 0) {
						foreach ($params as $o) {
							if(substr($o, 0, 6) == 'table=') {
								$_table = str_replace('table=', '', $o);
							} elseif (substr($o, 0, 7) == 'primary') {
								$_contents = str_replace('id', str_replace('primary=', '', $o), $_contents);
							}
						}
					}
					$_contents = str_replace('@table@', $_table, $_contents);
					fwrite($_myfile, $_contents);
					fclose($_myfile);
					CLI::write($_mname . ' model created.');
				} else {
					throw new \Exception($params[0] . ' model already exists.');
				}
			} else {
				throw new \Exception("Model name is not entered.");
			}
		} catch(\Exception $e) {
			CLI::write($e->getMessage());
		}
	}
}