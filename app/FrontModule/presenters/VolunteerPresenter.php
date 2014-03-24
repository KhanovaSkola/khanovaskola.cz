<?php

namespace FrontModule;

use \Nette\Caching\Cache;


class VolunteerPresenter extends BaseFrontPresenter
{

	private function getLinks()
	{
		return [
			'default' => 'Dobrovolníci',
			'howToTranslate' => 'Jak na to',
			'rules' => 'Stylistická pravidla',
		];
	}

	public function renderDefault()
	{
		$this->renderFromWikiPage('dobrovolnici', $this->getLinks());
		// $this->template->eng_videos = 4560;

		// $this->template->volunteers = $this->context->volunteers->findAll()->order('name ASC');
		// $this->template->wanted_cats =$this->context->categories->findByVotes();
	}

	public function renderHowToTranslate()
	{
		$this->renderFromWikiPage('jaknato', $this->getLinks());
	}

	public function renderRules()
	{
		$this->renderFromWikiPage('pravidla', $this->getLinks());
	}

}
