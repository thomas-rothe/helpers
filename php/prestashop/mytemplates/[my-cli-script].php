<?php

// get module directory
$modulePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'mymodule';

// get ps/config/config.inc.php
$configPath = dirname(dirname($modulePath)) . DIRECTORY_SEPARATOR . 'config';
require $configPath . DIRECTORY_SEPARATOR . 'config.inc.php';

// get [ps]/modules/mymodule/src/MyClass.php
require $modulePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'MyClass.php';

// get module configs
$config = array(
	'MY_VAR_1'                              => Configuration::get('MY_VAR_1'),
	'MY_VAR_2'                              => Configuration::get('MY_VAR_2'),
	'MY_VAR_3'                              => Configuration::get('MY_VAR_3'),
	'MY_VAR_4'                              => Configuration::get('MY_VAR_4'),
);

// initialize class
$myObject = new MyClass(
	$config['MY_VAR_1']
	$config['MY_VAR_2']
);

// execute cronjob
$status = $myObject->myCronjob(
	$config['MY_VAR_3'],
	$config['MY_VAR_3']
);

if ($status) {
	echo 'Cronjob finished successfully.';
	return 0;
}
