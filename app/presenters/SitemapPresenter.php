<?php

class SitemapPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->getHttpResponse()->setContentType('application/xml');
		$this->setLayout(FALSE);
	}



	public function renderRobotsTxt()
	{
		$robots = "# see http://www.robotstxt.org/orig.html for documentation\n";
		$this->getHttpResponse()->setContentType('text/plain');
		$this->sendResponse(new \Nette\Application\Responses\TextResponse($robots));
	}

}