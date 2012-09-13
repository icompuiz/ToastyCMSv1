<?php 
class DATABASE_CONFIG { 
	public $default = array(
		'datasource' => 'Database/Mysql',
		'port' => 'n',
		'login' => 'root',
		'host' => 'localhost',
		'persistent' => false,
		'database' => 'Toasty',
		'password' => 'icompuiz',
		'prefix' => '',
		'encoding' => '',
	);

	public $variables = array(
		'datasource' => 'CsvSource',
		'path' => '../Config/sitevariables',
		'extension' => 'csv',
		'readonly' => 'false',
	);
}