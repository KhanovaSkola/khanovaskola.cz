<?php

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

Nette\Diagnostics\Debugger::$logger->mailer = callback('CustomMailer', 'mailer');

Kdyby\Replicator\Container::register();

$routes = new \Config\Routes();
$routes->setup($container);

// Configure and run the application!
$container->application->run();
