<?php

use Nette\Caching\Cache;


class StaticPresenter extends BasePresenter
{

	public function renderRobots()
	{
		header('Content-Type: text/plain');
		$res = file_get_contents(__DIR__ . '/../templates/Static/robots.txt');
		$this->sendResponse(new \Nette\Application\Responses\TextResponse($res));
	}



	public function renderOpensearch()
	{
		$this->template->link = $this->link('//:Front:Search:');
		$this->template->suggest = $this->link('//:Front:Search:suggest');
	}



	public function renderAutocomplete()
	{
		$cache = new Cache($this->context->cacheStorage, 'autocomplete');
		if (!isset($cache[$this->user->id])) {

			$words = [];
			foreach ($this->context->autocomplete->findAll() as $word) {
				$words[] = $word['label'];
			}

			$cache['dictionary'] = $words;
			$this->sendJson($words);
		}

		$this->sendJson($cache['dictionary']);
	}

}
