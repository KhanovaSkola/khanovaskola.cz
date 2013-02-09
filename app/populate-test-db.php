<?php
error_reporting(E_ALL);

// Load Nette Framework
require __DIR__ . '/../vendor/autoload.php';

$branch = \Mikulas\Git::getBranch();
if (in_array($branch, ['production', 'staging'])) {
	die("Cannot populate $branch database with test data.");
}

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


$faker = Faker\Factory::create('cs_CZ');
//$faker->seed(1); // uncomment for same names

$coach = $container->users->find(1);
//$count = $coach->getStudents()->count();
foreach ($coach->getStudents() as $student) {
	$student->delete();
}

// add students
for ($i = 0; $i < 20; ++$i) {
	$user = $container->users->insert([
		'mail' => $faker->email,
		'name' => $faker->name,
		'google_id' => 'faker',
	]);
	$user->addCoach($coach);
}

foreach ($coach->getStudents() as $student) {
	// add watched videos
	for ($i = 0; $i < 5; ++$i) {
		$video = $container->videos->findRandom();
		$student->setProgress($video, mt_rand(10, 10 * 60));
	}

	// add answers
	for ($i = 0; $i < 5; ++$i) {
		$exercise = $container->exercises->findAll()->order('Rand()')->limit(1)->fetch();

		$tries = 40;
		for ($try = 0; $try < $tries; ++$try) {
			$student->saveExerciseAnswer($exercise->id, probablity($try, $tries), mt_rand(750, 70 * 1000));
		}
	}
}


function probablity($try, $tries)
{
	$offset = $tries / 3;
	$rand = mt_rand(0, 1e7) / 1e7;
	$threshold = log($try + $offset) / log($tries + $offset);
	return $threshold > $rand;
}