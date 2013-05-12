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

foreach ($container->videos->findBy(['uploader' => 'khanacademyczech']) as $video) {
	$meta = $video->getMetaData();
	$desc = $meta->data->description;
	dump($desc);
	$m = [];
	preg_match('~^(.*?)(\.|,|$)~sim', $desc, $m);
	$id = search($m[1]);
	$video->youtube_id_original = $id;
	$video->update();
}

function search($q)
{
	$res = file_get_contents('https://gdata.youtube.com/feeds/api/videos?' . http_build_query([
		'q' => $q,
	    'author' => 'khanacademy',
	    'max-results' => '1',
	    'v' => '2',
	]));
	$xml = simplexml_load_string($res);
	$idparts = explode(':', $xml->entry->id);
	$id = end($idparts);

	return $id;
}
