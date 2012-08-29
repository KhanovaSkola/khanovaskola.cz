<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;


class ContactPresenter extends BaseFrontPresenter
{

	public function renderReport($url, $time, $title = NULL)
	{
		$this['issueForm']['label']->setValue($title); // optional

		$this['issueForm']['url']->setValue($url);
		$this['issueForm']['time']->setValue($time);
		$this['issueForm']['user_id']->setValue($this->user->id);
	}



	public function createComponentIssueForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('label', 'Hlavní sdělení')
			->setRequired();
		$form->addTextarea('description', 'Popis');

		$form->addHidden('url');
		$form->addHidden('time');
		$form->addHidden('user_id');

		$form->addSubmit('send', 'Odeslat');
		$form->onSuccess[] = callback($this, 'onSuccessIssueForm');

		return $form;
	}



	public function onSuccessIssueForm(Form $form)
	{
		$gh = new \Github($this->context);

		$data = $form->values;
		$data['label'] = ucFirst($data['label']);
		$data['branch'] = \Git::getBranch();
		$data['commit'] = substr(\Git::getCommit(), 0, 7);
		$gh->createIssue($data);

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ["issues"]]);

		$this->flashMessage('Moc děkujeme za zpětnou vazbu. Vaši zprávu zpracujeme co nejdříve.');
		$this->redirect(':Front:Homepage:');
	}

}
