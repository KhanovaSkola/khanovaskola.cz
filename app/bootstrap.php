<?php

// Load Nette Framework
require __DIR__ . '/../vendor/autoload.php';

// Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$local_ips = ['192.168.100.53', '192.168.100.57'];
$configurator->setDebugMode(array_merge($local_ips, ['79.98.75.3']));
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

Kdyby\Replicator\Container::register();

$routes = new Routes();
$routes->setup($container);

// Configure and run the application!
$container->application->run();
