<?php

namespace FrontModule;

use Nette\Application\Responses\TextResponse;
use Nette\Caching\Cache;


class DynamicCssPresenter extends \BasePresenter
{

	public function actionDefault()
	{
		if (!$this->user->isLoggedIn()) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$cache = new Cache($this->context->cacheStorage, 'dynamic_css');
		if (!isset($cache[$this->user->id])) {
			$data = $this->generateStyle();
			$cache->save($this->user->id, $data, [
				\Nette\Caching\Cache::TAGS => ["watched/{$this->user->id}"],
			]);

			$session = $this->context->session->getSection('dynamic_css');
			$session->hash = md5($data);
		}

		$this->getHttpResponse()->setContentType("text/css");
		$this->sendResponse(new TextResponse($cache[$this->user->id]));
	}



	protected function generateStyle()
	{
		$threshold = 98;

		$watched = [];
		foreach ($this->user->entity->getAllProgress(['percent >= ?' => $threshold]) as $progress) {
			$watched[] = ".v-{$progress->video_id}:before";
		}

		$partial = [];
		foreach ($this->user->entity->getAllProgress(['percent < ?' => $threshold]) as $progress) {
			$partial[] = ".v-{$progress->video_id}:before";
		}

		$style = implode(',', $watched) . ' {content: "\2611"; color: rgb(43, 157, 0);}' . "\n";
		$style .= implode(',', $partial) . ' {content: "\e793"; color: rgb(72, 113, 201);}';

		return $style;
	}

}
