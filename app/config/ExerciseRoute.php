<?php

namespace Config;

use Nette\Application\Routers\Route;
use Nette\Http\IRequest;


class ExerciseRoute extends Route
{

	protected $context;

	protected $args;



	public function init($context, $category_arg, $exercise_arg)
	{
		$this->context = $context;
		$this->args = (object) [
			'category' => $category_arg,
			'exercise' => $exercise_arg,
		];
	}



	public function match(IRequest $request) {
		/** @var $appRequest \Nette\Application\Request */
		$appRequest = parent::match($request);

		if ($appRequest === NULL) {
			return NULL;
		}

		if (!is_numeric($appRequest->parameters[$this->args->category])) {
			$slug = $appRequest->parameters[$this->args->category];
			$category = $this->context->categories->findBySlug($slug);
			if ($category == NULL) {
				return NULL;
			}

			$params = $appRequest->parameters;
			$params[$this->args->category] = $category->id;
			$appRequest->parameters = $params;
		}
		if (!is_numeric($appRequest->parameters[$this->args->exercise])) {
			$slug = $appRequest->parameters[$this->args->exercise];
			$exercise = $this->context->exercises->findBySlug($slug);
			if ($exercise == NULL) {
				return NULL;
			}

			$params = $appRequest->parameters;
			$params[$this->args->exercise] = $exercise->id;
			$appRequest->parameters = $params;
		}

		return $appRequest;

	}
}
