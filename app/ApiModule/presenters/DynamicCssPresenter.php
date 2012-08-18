<?php

namespace ApiModule;

use Nette\Application\Responses\TextResponse;
use Nette\Caching\Cache;


class DynamicCssPresenter extends \BasePresenter
{

	public function actionDefault()
	{
		$cache = new Cache($this->context->cacheStorage, 'dynamic_css');
		if (!isset($cache[$this->user->id])) {
			$data = $this->generateStyle();
			$cache->save($this->user->id, $data, [
				\Nette\Caching\Cache::TAGS => ["watched/{$this->user->id}"],
			]);
		}

		$this->getHttpResponse()->setContentType("text/css");
		$this->sendResponse(new TextResponse($cache[$this->user->id]));
	}



	protected function generateStyle()
	{
		$threshold = 98;

		$watched = [];
		foreach ($this->user->entity->getAllProgress(['percent >= ?' => $threshold]) as $progress) {
			$watched[] = ".v-{$progress->video_id}";
		}

		$partial = [];
		foreach ($this->user->entity->getAllProgress(['percent < ?' => $threshold]) as $progress) {
			$partial[] = ".v-{$progress->video_id}";
		}

		$style = implode(',', $watched) . " {\n\tbackground-image: url('/images/video-indicator-complete.png');\n}\n\n";
		$style .= implode(',', $partial) . " {\n\tbackground-image: url('/images/video-indicator-started.png');\n}\n\n";

		$style .= "@media screen and (-webkit-min-device-pixel-ratio: 2), screen and (max-moz-device-pixel-ratio: 2) {\n";
		$style .= "\t" . implode(',', $watched) . " {\n\t\tbackground-image: url('/images/video-indicator-complete@2x.png'); background-size: 10px auto;\n\t}\n";
		$style .= "\t" . implode(',', $partial) . " {\n\t\tbackground-image: url('/images/video-indicator-started@2x.png'); background-size: 10px auto;\n\t}\n\n";
		$style .= "}\n";

		return $style;
	}

}
