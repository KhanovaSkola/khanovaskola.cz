<?php

require __DIR__ . '/../vendor/autoload.php';
Tester\Helpers::setup();

$configurator = new Nette\Config\Configurator;
$configurator->setDebugMode(TRUE);
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__ . '/../app')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/../app/config/config.neon');
$configurator->addConfig(__DIR__ . '/../app/config/config.db.neon');
$configurator->addConfig(__DIR__ . '/../app/config/config.local.neon');
$configurator->addConfig(__DIR__ . '/../app/config/config.test.neon'); // must be last
$container = $configurator->createContainer();

if (extension_loaded('xdebug')) {
	Tester\CodeCoverage\Collector::start(__DIR__ . '/coverage.dat');
}
