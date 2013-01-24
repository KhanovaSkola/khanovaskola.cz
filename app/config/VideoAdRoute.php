<?php

class VideoAdRoute extends \Nette\Application\Routers\Route
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

		if (!is_numeric($appRequest->parameters[$this->args->video])) {
			$slug = $appRequest->parameters[$this->args->video];
			$video = $this->context->videos->findByAdSlug($slug);
			if ($video == NULL) {
				return NULL;
			}

			$params = $appRequest->parameters;
			$params[$this->args->video] = $video->id;
			// match any category
			$params[$this->args->category] = $video->getCategories()->fetch()->id;
			$appRequest->parameters = $params;
		}

		return $appRequest;

	}
}
