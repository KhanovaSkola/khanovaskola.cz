<?php

namespace Config;

use Nette\Application\Routers\Route;
use Nette\Http\IRequest;


class SlugRoute extends Route
{

	protected $context;

	protected $argument;

	protected $table;



	public function init($context, $argument, $table)
	{
		$this->context = $context;
		$this->argument = $argument;
		$this->table = $table;
	}



	public function match(IRequest $request) {
		/** @var $appRequest \Nette\Application\Request */
		$appRequest = parent::match($request);

		if ($appRequest === NULL) {
			return NULL;
		}

		if (!is_numeric($appRequest->parameters[$this->argument])) {
			$compare = $appRequest->parameters[$this->argument];
			$category = $this->context->{$this->table}->findBySlug($compare);
			if ($category == NULL) {
				return NULL;
			}

			$params = $appRequest->parameters;
			$params[$this->argument] = $category->id;
			$appRequest->parameters = $params;
		}

		return $appRequest;

	}
}
