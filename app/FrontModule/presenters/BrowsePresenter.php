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



	public function createComponentAddForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('label', 'Název');
		$form->addTextArea('description', 'Popis');
		$form->addText('youtube_id', 'Youtube ID');
		$form->addMultiSelect('tags', 'Tagy', $this->context->tags->getFill());
		$form->addMultiSelect('categories', 'Kategorie', $this->context->categories->getFill());

		$form->addSubmit('send', 'Uložit');
		$form->onSuccess[] = callback($this, 'onSuccessAddForm');

		return $form;
	}



	public function createComponentEditForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('label', 'Název');
		$form->addTextArea('description', 'Popis');

		$form->addSubmit('send');
		$form->onSuccess[] = callback($this, 'onSuccessEditForm');

		return $form;
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



	public function onSuccessAddForm($form)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_ADDER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;

		try {
			$vid = $this->context->videos->insert([
				'label' => $v->label,
				'description' => $v->description,
				'youtube_id' => $v->youtube_id
			]);
		} catch (\PDOException $e) {
			if ($e->getCode() != 23000) {
				throw $e;
			}
			$form->addError('Toto jméno má už jiné video zabrané.');
			return FALSE;
		}

		$video = $this->context->videos->find($vid->id);
		$video->addSlug($video->label);

		foreach ($v->categories as $cid) {
			$this->context->categories->find($cid)->addVideo($video);
		}
		foreach ($v->tags as $tid) {
			$video->addTag($tid);
		}

		// invalidate cache
		$invalid = ["videos", "video/$vid->id"];
		foreach ($v['categories'] as $cid) {
			$invalid[] = "category/$cid";
		}
		foreach ($v['tags'] as $tid) {
			$invalid[] = "tag/$tid";
		}
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $invalid]);
		

		$this->redirect(':Front:Watch:', ['vid' => $video->id]);
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

}
