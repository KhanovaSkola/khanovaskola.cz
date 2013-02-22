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

$data = [
	'Registrations' => $container->users->findAll()->count(),
	'Registrations (Google)' => $container->users->findBy(['google_id IS NOT NULL'])->count(),
	'Registrations (FB)' => $container->users->findBy(['facebook_id IS NOT NULL'])->count(),
	'Registrations (Pass)' => $container->users->findBy(['password <> 0'])->count(),
	'Videos (Translated)' => $container->videos->findAll()->count(),
	'Videos (Dubbed)' => $container->videos->findAllDubbed()->count(),
];

$counters = [];
foreach ($data as $label => $value) {
	$counters[] = [
		'name' => \Nette\Utils\Strings::webalize($label),
		'display_name' => $label,
		'value' => $value,
		'period' => 15 * 60,
		'attributes' => ['display_min' => 0],
	];
}

$c = $container->parameters['metrics'];
$client = new Client($c['user'], $c['key']);
$res = $client->post('/metrics', ['gauges' => $counters]);
if ($res !== NULL) {
	var_dump($res);
	die(1);
}
