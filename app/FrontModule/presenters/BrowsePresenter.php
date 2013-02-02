<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;


class BrowsePresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $id;

	/** @var \Category */
	protected $category;



	public function startup()
	{
		parent::startup();
		$this->category = $this->context->categories->find($this->id);
		if (!$this->category) {
			throw new \Nette\Application\BadRequestException;
		}

		if (!$this->category || $this->category->isSubject()) {
			// those are not rendered
			$this->redirect(':Front:Homepage:');
		}
	}



	public function renderDefault()
	{
		$this->template->selected = $this->category;
		if ($this->category->isLeaf()) {
			$this->template->category = $this->category->getParent();
			$this->template->leaf = $this->category;
			$this->template->show_video_order = $this->user->isInrole(\NetteUser::ROLE_EDITOR);

		} else { // isSubcategory
			$this->template->show_video_order = FALSE;
			$this->template->category = $this->category;
		}
	}



	public function renderEdit()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$this->template->category = $this->category;

		$this['editForm']['label']->setValue($this->category->label);
		$this['editForm']['description']->setValue($this->category->description);
	}



	public function createComponentEditForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('label', 'Název');
		$form->addTextArea('description', 'Popis');

		$form->addSubmit('send', 'Uložit')->controlPrototype->class = "simple-button green";
	}



	public function onSuccessEditForm(Form $form)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;
		$c = $this->category;
		$c->label = $v->label;
		$c->description = $v->description;
		$c->update();
		$c->addSlug($c->label);

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => [
			"categories",
			"category/$c->id",
			"category/" . $c->getParent()->id,
		]]);

		$this->redirect(':Front:Browse:');
	}



	public function handleUpdatePositions($videos)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$data = explode(',', $videos);
		$this->category->updatePositions($data);

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ["categories", "category/{$this->id}"]]);

		if ($this->isAjax()) {
			$this->sendJson(['status' => 'success']);
		}

		$this->redirect('this');
	}



	public function handleVote()
	{
		if (!$this->user->isLoggedIn() || $this->category->hasUserVotedFor($this->user->entity)) {
			$this->redirect('this');
		}

		$this->category->addVote($this->user->entity);
		$this->redirect('this');
	}



	public function handleRemoveVote()
	{
		if (!$this->user->isLoggedIn()) {
			$this->redirect('this');
		}

		$this->category->removeVote($this->user->entity);
		$this->redirect('this');
	}

}
