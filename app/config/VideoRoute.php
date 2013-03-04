<?php

namespace Config;

use Nette\Application\Routers\Route;
use Nette\Http\IRequest;


class VideoRoute extends Route
{

	protected $context;

	protected $args;



	public function init($context, $category_arg, $video_arg)
	{
		$this->context = $context;
		$this->args = (object) [
			'category' => $category_arg,
			'video' => $video_arg,
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
		if (!is_numeric($appRequest->parameters[$this->args->video])) {
			$slug = $appRequest->parameters[$this->args->video];
			$video = $this->context->videos->findBySlug($slug);
			if ($video == NULL) {
				return NULL;
			}

			$params = $appRequest->parameters;
			$params[$this->args->video] = $video->id;
			$appRequest->parameters = $params;
		}

		return $appRequest;

	}
}
