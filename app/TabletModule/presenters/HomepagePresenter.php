<?php

namespace TabletModule;


class HomepagePresenter extends BaseTabletPresenter
{

    public function renderDefault()
    {
        $this->template->subjects = $this->context->categories->findRoot();
    }



    public function renderRobotsTxt()
    {
        $robots = "# see http://www.robotstxt.org/orig.html for documentation\nUser-agent: *\nDisallow: /\n";
        $this->getHttpResponse()->setContentType('text/plain');
        $this->sendResponse(new \Nette\Application\Responses\TextResponse($robots));
    }

}
