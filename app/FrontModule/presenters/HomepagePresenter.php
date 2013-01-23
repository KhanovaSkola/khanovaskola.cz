<?php

namespace FrontModule;


class HomepagePresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->featured_video = $this->context->videos->findRandomDubbed();
		$this->template->hide_search = TRUE;

		$examples = [
			'maths' => [
				'rovnice', 'komplexní čísla', 'mřížka', 'zaokrouhlování', 'NSN', 'prvočíslo',
				'exponenty', '1. ekvivalentní úprava', 'absolutní hodnota', 'binomické rozdělení',
			],
			'people' => [
				'Newton', 'Eukleides', 'Leibniz', 'Usain Bolt', 'Mobius',
				'Lincoln', 'Salman Khan',
			],
			'other' => [
				'Coulombův zákon', 'prvky', 'atomy', 'Snellův zákon', 'peníze',
				'Airbus', 'zlato', 'Porshe', 'zrychlení', 'galaxie', 'teleskop'
			],
		];

		$selected = [
			'maths' => (array) array_rand($examples['maths'], 2),
			'people' => (array) array_rand($examples['people'], 1),
			'other' => (array) array_rand($examples['other'], 1),
		];
		$words = [];
		foreach ($selected as $type => $sel) {
			foreach ($sel as $i) {
				$words[] = $examples[$type][$i];
			}
		}
		shuffle($words);

		$this->template->search_examples = implode(', ', $words);
	}



	public function renderLibrary()
	{
		$this->template->categories = $this->context->categories->findRoot();
	}



	public function actionGone()
	{
		throw new \Nette\Application\BadRequestException('Gone', 410);
	}



	/** @todo rewrite */
	public function actionGithubCallback($code)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_ADMIN)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$github = new \Github($this->context);
		if ($code) {
			$auth = $github->tradeCodeForAuth($code);
			var_dump($auth);
		}
		die;
	}



	public function getBacklink()
	{
		return NULL;
	}



	public function renderOpensearch()
	{
		$link = $this->link('//:Front:Search:');
		$this->getHttpResponse()->setContentType('application/opensearchdescription+xml', 'utf8');
		$this->sendResponse(new \Nette\Application\Responses\TextResponse("
			<?xml version=\"1.0\"?>
			<OpenSearchDescription xmlns=\"http://a9.com/-/spec/opensearch/1.1/\">
				<ShortName>KŠ</ShortName>
				<Description>Khanova škola</Description>
				<Url template=\"$link?q={searchTerms}\" type=\"text/html\"/>
				<Image type=\"image/x-icon\" width=\"16\" height=\"16\">{$this->template->cdnUrl}/favicon.ico</Image>
			</OpenSearchDescription>
		"));
	}

}
