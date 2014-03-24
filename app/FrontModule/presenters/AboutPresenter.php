<?php

namespace FrontModule;


class AboutPresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->renderFromWikiPage('onas');
	}

	public function renderProjects()
	{
		$this->renderFromWikiPage('projekty');
	}

}
