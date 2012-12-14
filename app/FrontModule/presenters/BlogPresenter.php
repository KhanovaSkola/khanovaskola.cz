<?php

namespace FrontModule;

use Nette\Application\UI\Form;


class BlogPresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $aid;

	/** @var \Article */
	protected $article;



	public function startup()
	{
		parent::startup();

		$this->article = $this->context->articles->find($this->aid);

		if (($this->aid !== NULL && !$this->article)
		|| ($this->article && !$this->user->isInrole(\NetteUser::ROLE_BLOG) && !$this->article->is_published)) {
			throw new \Nette\Application\BadRequestException;
		}

		if ($this->aid && $this->action === 'default') {
			$this->redirect('detail');
		}
	}



	protected function createTemplate($class = NULL)
	{
		$template = parent::createTemplate($class);
		$template->registerHelper('markdown', callback('\Markdown'));

		return $template;
	}



	public function renderDefault()
	{
		$this->template->articles = $this->context->articles->findPublished();
		if ($this->user->isInrole(\NetteUser::ROLE_BLOG)) {
			$this->template->to_publish = $this->context->articles->findPublished(FALSE);
		}
	}



	public function renderDetail()
	{
		$this->template->article = $this->article;
	}



	public function renderEdit()
	{
		$this['articleForm']['label']->setValue($this->article->label);
		$this['articleForm']['text']->setValue($this->article->text);
	}



	public function createComponentArticleForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('label', 'Nadpis');
		$form->addTextarea('text', 'Text');

		$form->addSubmit('save', 'Uložit');
		$form->onSuccess[] = callback($this, 'onSuccessArticleForm');

		return $form;
	}



	public function actionAdd()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_BLOG)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$this['articleForm']->addSubmit('publish', 'Uložit a zveřejnit');
	}



	public function actionEdit()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_BLOG)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		if (!$this->article->is_published) {
			$this['articleForm']->addSubmit('publish', 'Uložit a zveřejnit');
		}
	}



	public function onSuccessArticleForm($form)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_BLOG)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;
		$publish = !$form['save']->isSubmittedBy();

		if (!$this->aid) {
			$article = $this->context->articles->insert([
				'label' => $v->label,
				'text' => $v->text,
				'datetime' => date('Y-m-d H:i:s'),
				'is_published' => $publish,
			]);
			$article->addSlug($v->label);
			
			if ($publish) {
				$this->flashMessage('Nový článek na blog byl uložen a zveřejněn.');
			} else {
				$this->flashMessage('Nový článek na blog byl uložen a čeká na zveřejnění.');
			}

		} else {
			$article = $this->article;

			$article->label = $v['label'];
			$article->text = $v['text'];
			$article->is_published = $article->is_published || $publish;
			$article->update();

			$article->addSlug($v['label']);

			$this->flashMessage('Článek upraven.');
		}

		$this->redirect('detail', ['aid' => $article->id]);
	}



	public function handlePublish()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_BLOG)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$this->article->setPublished();
		$this->flashMessage('Článek zveřejněn.');
		$this->redirect('detail');
	}



	public function renderRss()
	{
		$httpResponse = $this->context->getService('httpResponse');
		$httpResponse->setContentType('application/rss+xml', 'UTF-8');

		$rss = $this["rss"];

		$rss->title = "Khanova škola";
		$rss->description = "Blog";
		$rss->link = $this->link("//:Front:Homepage:");
		$rss->setChannelProperty("lastBuildDate", time());

		$items = [];
		foreach ($this->context->articles->findPublished() as $article) {
			$items[] = [
				'link' => $this->link("//:Front:Blog:detail", ['aid' => $article->id]),
				'title' => $article->label,
				'description' => \Markdown($article->text),
			];
		}

		$rss->items = $items;
	}

	protected function createComponentRss()
	{
		return new \RssControl;
	}

}
