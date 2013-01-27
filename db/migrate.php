<?php

require __DIR__ . '/../vendor/autoload.php';

use Nette\Utils\Finder;

$modes = ['local', 'test'];
if ($argc !== 2 || !in_array($argv[1], $modes)) {
	echo "Usage $argv[0] (" . implode('|', $modes) . ")\n";
	die(1);
}

$configurator = new Nette\Config\Configurator;
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__ . '/../app')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . "/../app/config/config.db.neon");
$configurator->addConfig(__DIR__ . "/../app/config/config.$argv[1].neon");
$container = $configurator->createContainer();

$db = $container->database;


$shards = [];
foreach (Finder::findFiles('*.sql')->from(__DIR__) as $file => $i)
{
	$order = (int) pathinfo($file)['filename'];
	$shards[$order] = $file;
}

ksort($shards);

$q = $db->query('SELECT version FROM _version');
$res = $q->fetch();
$q->closeCursor();
$version = $res['version'];

if ($version === array_reverse(array_keys($shards))[0]) {
	echo "Database already on the most recent version.\n";
	die;
}

foreach ($shards as $i => $file)
{
	if ($i === $version - 1) {
		echo "Skipping to $version\n";
		continue;
	}

	echo "Running $i\n";
	$query = file_get_contents($file);
	$query = str_replace('`khanovaskola`', '`' . $container->parameters['database']['dbname'] . '`', $query);

	executeMultiQuery($db, $query);

	$db->query('UPDATE _version SET version=?', $i);
}


function executeMultiQuery($db, $query)
{
	foreach (preg_split('~(?<=;)~', $query) as $row) {
		echo trim($row) . "\n";
		$db->query($row);
	}
}