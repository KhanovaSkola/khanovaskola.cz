<?php

class SitemapPresenter extends BasePresenter
{

    public function renderDefault()
    {
        $this->getHttpResponse()->setContentType('application/xml');
        $this->setLayout(FALSE);
    }

}