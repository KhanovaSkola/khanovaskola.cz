<?php

require __DIR__ . '/../../vendor/autoload.php';

$configurator = new Nette\Config\Configurator;

$configurator->setDebugMode();

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../../temp');
$configurator->createRobotLoader()
	->addDirectory(__DIR__ . '/../../app')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/../../app/config/config.neon');
$configurator->addConfig(__DIR__ . '/../../app/config/config.db.neon');
$configurator->addConfig(__DIR__ . '/../../app/config/config.local.neon');

$container = $configurator->createContainer();

$container->user->isLoggedIn();
$container->user->isInRole($container->parameters['adminer_editor']['role']);

$_GET['username'] = ''; // triggers autologin

function adminer_object() {

	class AdminerSoftware extends Adminer {

		private $context;

		function __construct($context) {
			$this->context = $context;
		}

		function name() {
			// custom name in title and heading
			return 'Khanova Škola';
		}

		function credentials() {
			// server, username and password for connecting to database
			$c = $this->context->parameters['database'];
			return array($c['host'], $c['user'], $c['password']);
		}

		function database() {
			// database name, will be escaped by Adminer
			return $this->context->parameters['database']['dbname'];
		}

		function login() {
			return $this->isLoggedIn() && $this->isInRole();
		}

		function tableName($tableStatus) {
			// only tables with comment will be displayed
			return h($tableStatus["Comment"]);
		}

		function fieldName($field, $order = 0) {
			// only columns with comments will be displayed
			// table must have at least one column with comment
			// to select properly
			return h($field["comment"]);
		}

		function loginForm() {
			if (!$this->isLoggedIn()) {
				echo "<p>Přihlaste se prosím ke svému účtu přes tradiční formulář.</p>";
			} else if (!$this->isInRole()) {
				echo "<p>Váš účet nemá oprávnění k Adminer Editor.</p>";
			}
		}

		private function isLoggedIn() {
			return $this->context->user->isLoggedIn();
		}

		private function isInRole() {
			return $this->context->user->isInRole($this->context->parameters['adminer_editor']['role']);
		}

	}

	global $container;
	return new AdminerSoftware($container);
}

include "./editor-3.6.3-mysql.php";
