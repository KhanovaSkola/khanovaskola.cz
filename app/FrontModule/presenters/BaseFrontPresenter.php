<?php

namespace FrontModule;


abstract class BaseFrontPresenter extends \BasePresenter
{

	public function renderFromWikiPage($page, array $links = NULL)
	{
		if ($links === NULL)
		{
			$links = [
				'About:' => 'O nás',
				'Blog:' => 'Blog',
				'About:projects' => 'Projekty',
				'Contact:' => 'Tým',
				'About:sponsors'  => 'Sponzoři',
			];
		}

		$this->template->wikiPageContent = $this->context->wiki->getPage($page);
		$this->template->wikiLinks = $links ?: [];
		$this->template->wikiEdit = "https://wiki.khanovaskola.cz/doku.php?id=$page&do=edit";
		$this->setView('../_wiki');
	}

}
