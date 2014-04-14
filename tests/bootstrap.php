<?php

require __DIR__ . '/../vendor/autoload.php';
Tester\Helpers::setup();

$configurator = new Nette\Config\Configurator;
$configurator->setDebugMode(TRUE);
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__ . '/../app')
	->register();



$configurator->addConfig(__DIR__ . '/../app/config/config.neon');
$configurator->addConfig(__DIR__ . '/../app/config/config.db.neon');

$local = __DIR__ . '/../app/config/config.local.neon';
if (file_exists($local)) {
	$configurator->addConfig($local);
}

$configurator->addConfig(__DIR__ . '/../app/config/config.test.neon'); // must be last



$container = $configurator->createContainer();

if (extension_loaded('xdebug')) {
	Tester\CodeCoverage\Collector::start(__DIR__ . '/coverage.dat');
}
