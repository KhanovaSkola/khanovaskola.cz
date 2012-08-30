<?php

require __DIR__ . '/PHPWebDriver/WebDriver.php';
require __DIR__ . '/../../libs/Nette/loader.php';
require __DIR__ . '/Application.php';

/** ***************************
 * Nette setup
 ****************************** */
// Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$configurator->setDebugMode();
$configurator->enableDebugger(__DIR__ . '/../../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__ . '/../../app')
	->addDirectory(__DIR__ . '/../../libs')
	->addDirectory(__DIR__)
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/../../app/config/config.neon', 'selenium');

$container = $configurator->createContainer();

$routes = new Routes();
$routes->setup($container);


/** ***************************
 * Selenium setup
 ****************************** */
// This would be the url of the host running the server-standalone.jar
$web_driver = new PHPWebDriver_WebDriver('http://localhost:4444/wd/hub');
$session = $web_driver->session('chrome');


/** ***************************
 * Tests
 ****************************** */

foreach (scandir(__DIR__ . '/cases') as $file) {
	if (in_array($file, ['.', '..'])) {
		continue;
	}

	include_once(__DIR__ . "/cases/$file");
	$class = "\\Selenium\\" . substr($file, 0, -4);
	$case = new $class($session);

	try {
		$case->run();

	} catch (\Selenium\TestException $e) {
		echo "$class test FAILED: " . $e->getMessage() . "\n";
		continue;
	}
	echo "$class ok\n";
}

$session->close();
