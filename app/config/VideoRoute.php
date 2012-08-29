<?php

class VideoRoute extends \Nette\Application\Routers\Route
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



	public function match(\Nette\Http\IRequest $request) {
		/** @var $appRequest \Nette\Application\Request */
		$appRequest = parent::match($request);

		if ($appRequest === NULL) {
			return NULL;
		}

		if (!is_numeric($appRequest->parameters[$this->args->category])) {
			$compare = $appRequest->parameters[$this->args->category];
			$category = $this->context->categories->findOneBy(['slug' => $compare]);
			if ($category == NULL) {
				return NULL;
			}

			$params = $appRequest->parameters;
			$params[$this->args->category] = $category->id;
			$appRequest->parameters = $params;
		}
		if (!is_numeric($appRequest->parameters[$this->args->video])) {
			$compare = $appRequest->parameters[$this->args->video];
			$video = $this->context->videos->findOneBy(['slug' => $compare]);
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
