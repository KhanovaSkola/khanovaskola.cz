<?php
error_reporting(E_ALL);

// Load Nette Framework
require __DIR__ . '/../vendor/autoload.php';

use Metrics\Client;

// Configure application
$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

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

$data = [
	['name' => 'total_users', 'value' => $container->users->findAll()->count()],
	['name' => 'regs_google', 'value' => $container->users->findBy(['google_id IS NOT NULL'])->count()],
	['name' => 'regs_fb', 'value' => $container->users->findBy(['facebook_id IS NOT NULL'])->count()],
	['name' => 'regs_pass', 'value' => $container->users->findBy(['password <> 0'])->count()]
];
dump($data);

$c = $container->parameters['metrics'];
$client = new Client($c['user'], $c['key']);
$client->post('/metrics', ['gauges' => $data]);
