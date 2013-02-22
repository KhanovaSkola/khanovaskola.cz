<?php

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

}