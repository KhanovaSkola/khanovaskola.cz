<?php

use Nette\Diagnostics\Debugger;


// Load Nette Framework
require __DIR__ . '/../vendor/autoload.php';


// Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$configurator->setDebugMode(isset($_COOKIE['debug']) && $_COOKIE['debug'] === '9&(@QqxENEEb3Q4T');
$configurator->enableDebugger(__DIR__ . '/../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(APP_DIR)
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.db.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');
$container = $configurator->createContainer();

Debugger::$logger->mailer = callback('\Model\CustomMailer', 'mailer');

Kdyby\Replicator\Container::register();

$routes = new \Config\Routes();
$routes->setup($container);

$container->application->onStartup[] = function($app) {
	if (!extension_loaded('newrelic')) {
		return;
	}
	
	if (PHP_SAPI === 'cli') {
		newrelic_set_appname('khanovaskola.cz-cli');
	} else {
		newrelic_set_appname('khanovaskola.cz');
	}

	Debugger::$logger = new \NewRelic\Logger;
	Debugger::$logger->directory =& Debugger::$logDirectory;
	Debugger::$logger->email =& Debugger::$email;
};

$container->application->onRequest[] = function($app, $request) {
	if (!extension_loaded('newrelic')) {
		return;
	}

	if (PHP_SAPI === 'cli') {
		newrelic_name_transaction('$ ' . basename($_SERVER['argv'][0]) . ' ' . implode(' ', array_slice($_SERVER['argv'], 1)));
		newrelic_background_job(TRUE);
		return;
	}

	// NewRelic proper naming
	$params = $request->getParameters();
	newrelic_name_transaction($request->getPresenterName() . (isset($params['action']) ? ':' . $params['action'] : ''));
};

$container->application->onError[] = function($app, $e) {
	if (!extension_loaded('newrelic')) {
		return;
	}

	if ($e instanceof Nette\Application\BadRequestException) {
		return; // skip
	}

	// e500 log
	newrelic_notice_error($e->getMessage(), $e);
};

// Configure and run the application!
$container->application->run();
