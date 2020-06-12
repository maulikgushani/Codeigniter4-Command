<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Config\Services;

class RouteList extends BaseCommand
{
	protected $group       = 'mggroup';
	protected $name        = 'route:list';
	protected $description = 'Get a list of registered route.';
	protected $pad = 30;
	protected $startPad = 10;
	protected $defaultMethods = 'get,post,put,delete';

	public function showHelp()
	{
		CLI::write('Description:');
		CLI::write('   ' . $this->description);
		CLI::write('');
		CLI::write('Usage:');
		CLI::write('   php spark route:list');
		CLI::write('');
		CLI::write('Option:');
		CLI::write('   methods       Option for specific methods.');		
		CLI::write('');
		CLI::write('For more refer this link https://github.com/maulikgushani/Codeigniter4-Command');
	}

	public function run(array $params)
	{
		$service = Services::routes();
		$service = (array) $service;
		$keys = array_keys($service);
		$routes = $service[$keys[8]];
		$routesOptions = $service[$keys[9]];
		$_methods = isset($params[0]) && strpos($params[0], 'methods=') !== false ? trim(str_replace('methods=', "", $params[0])) : $this->defaultMethods;
		$_methods = explode(',', $_methods);
		CLI::write("Method".str_repeat(' ', abs($this->startPad - strlen("Method")))."Route".str_repeat(" ", abs(strlen('Route') - $this->pad)).'Name'.str_repeat(" ", abs(strlen('Name') - $this->pad))."Path");
		CLI::write("");
		$_pad = count($_methods) - 1;
		$array_k = array_keys($routes['get']);
		foreach ($_methods as $k => $_m) {
			if(array_key_exists($_m, $routes) && $routes[$_m] && count($routes[$_m]) > 0) {
				$_getpad = strtoupper($_m).str_repeat(' ', abs($this->startPad - strlen($_m)));
				foreach ($routes[$_m] as $name => $get) {
					$_oname = array_keys($get['route'])[0];
					$path = array_values($get['route'])[0];
					$_rname = $name != $_oname ? $name : "-";
					CLI::write($_getpad.$_oname.str_repeat(" ", abs(strlen($_oname) - $this->pad)).$_rname.str_repeat(" ", abs(strlen($_rname) - $this->pad)).$path);
					CLI::write("");
				}
				if($_pad != $k) {
					CLI::write("");
					CLI::write("");
				}
			}
		}
	}
}