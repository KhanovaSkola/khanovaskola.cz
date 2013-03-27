<?php

namespace NewRelic;

use Nette;


class NewRelic extends Nette\Object
{

	public static function register(\Nette\DI\Container $container)
	{
		if (!extension_loaded('newrelic')) {
			return;
		}

		$container->application->onStartup[] = function($app) use ($container) {			
			if (PHP_SAPI === 'cli') {
				newrelic_set_appname('khanovaskola.cz-cli');
			} else {
				newrelic_set_appname('khanovaskola.cz');
				newrelic_add_custom_parameter('user_id', $container->user->id);
			}

			Debugger::$logger = new \NewRelic\Logger;
			Debugger::$logger->directory =& Debugger::$logDirectory;
			Debugger::$logger->email =& Debugger::$email;
		};

		$container->application->onRequest[] = function($app, $request) {
			if (PHP_SAPI === 'cli') {
				newrelic_name_transaction('$ ' . basename($_SERVER['argv'][0]) . ' ' . implode(' ', array_slice($_SERVER['argv'], 1)));
				newrelic_background_job(TRUE);
				return;
			}

			// NewRelic proper naming
			$params = $request->getParameters();
			newrelic_name_transaction($request->getPresenterName() . (isset($params['action']) ? ':' . $params['action'] : ''));
		};

		$container->application->onError[] = function($app, $e) {
			if ($e instanceof Nette\Application\BadRequestException) {
				return; // skip
			}

			// e500 log
			newrelic_notice_error($e->getMessage(), $e);
		};
	}

}
