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
if (extension_loaded('newrelic')) {
	$configurator->addConfig(__DIR__ . '/config/config.newrelic.neon');
}
$configurator->addConfig(__DIR__ . '/config/config.db.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

if (Debugger::isEnabled()) {
	function d($args) {
		call_user_func_array(['ChromePhp', 'log'], func_get_args());
	}
}

$configurator->onCompile[] = function ($configurator, $compiler) {
	$compiler->addExtension('ajax', new VojtechDobes\NetteAjax\Extension);
};

$container = $configurator->createContainer();

if (!isset($container->parameters['development']) && (!isset($_COOKIE['staging_access']) || $_COOKIE['staging_access'] !== 'allowed')) {
	header("HTTP/1.0 403 Forbidden");
	echo "HTTP/1.0 403 Forbidden\n";
	die();
}

Debugger::$logger->mailer = callback('\Model\CustomMailer', 'mailer');

NewRelic\NewRelic::register($container);

Kdyby\Replicator\Container::register();

$routes = new \Config\Routes();
$routes->setup($container);

// Configure and run the application!
$container->application->run();
