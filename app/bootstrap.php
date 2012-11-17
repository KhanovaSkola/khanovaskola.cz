<?php

// Load Nette Framework
require LIBS_DIR . '/Nette/loader.php';
require LIBS_DIR . '/Markdown.php'; // not class, loaded directly

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
	->addDirectory(LIBS_DIR)
	->register();

Kdyby\Forms\Containers\Replicator::register();

// Create Dependency Injection container from config.neon file
$environment = Nette\Config\Configurator::detectDebugMode($local_ips)
	? $configurator::DEVELOPMENT : $configurator::PRODUCTION;
$configurator->addConfig(__DIR__ . '/config/config.neon', $environment);

$container = $configurator->createContainer();

$routes = new Routes();
$routes->setup($container);

// Configure and run the application!
$container->application->run();
