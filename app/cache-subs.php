<?php
error_reporting(E_ALL);

// Load Nette Framework
require __DIR__ . '/../vendor/autoload.php';

use Metrics\Client;

// Configure application
$configurator = new Nette\Config\Configurator;

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

// Create Dependency Injection container from config.neon file

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.db.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');
$container = $configurator->createContainer();

foreach ($container->videos->findAll() as $video) {
	if ($video->isDubbed())
		continue;
	echo "$video->label";
	$subs = $container->amara->getSubtitles($video);
	if (!$subs) {
		echo "\n\treloading\n";
		$container->amara->clearCache($video);
		$container->amara->getSubtitles($video);
	} else {
		echo ": ok\n";
	}
}
