<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;
use Nette\Utils\Html;
use Mikulas\Git;


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
		$form = $this->createForm($name);

		$form->addText('label', 'Hlavní sdělení')
			->setRequired();
		$form->addTextarea('description', 'Popis');

		$form->addHidden('url');
		$form->addHidden('time');
		$form->addHidden('user_id');
		$form->addHidden('antispam');

		$form->addSubmit('send', 'Odeslat')->getControlPrototype()->class = "simple-button green";
	}



	public function onSuccessIssueForm(Form $form)
	{
		$gh = new \Github($this->context);

		$data = $form->values;

		if (!$data['antispam']) {
			$this->flashMessage('Promiňte, vaše ohlášení chyby bylo označené jako spam. Můžete nás, prosím, kontaktovat přes email?');
			$this->redirect(':Front:Homepage:');
		}

		$data['label'] = ucFirst($data['label']);
		$data['branch'] = Git::getBranch();
		$data['commit'] = substr(Git::getCommit(), 0, 7);
		$issue = $gh->createIssue($data);

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ["issues"]]);

		$flash = Html::el("div");
		$flash->add(Html::el("p")->setText("Moc děkujeme za zpětnou vazbu. Vaši zprávu zpracujeme co nejdříve."));
		$flash->add(Html::el("p")->add(
			Html::el("a")->setText("Řešení můžete sledovat zde.")->href($issue->html_url)->addAttributes(['target' => '_blank'])
		));
		$this->flashMessage($flash);

		$this->redirect(':Front:Homepage:');
	}

}
