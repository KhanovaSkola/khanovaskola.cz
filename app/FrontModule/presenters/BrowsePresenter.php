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
		$this->category = $this->context->categories->findOneBy(['id' => $this->id]);
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

		} else { // isSubcategory
			$this->template->category = $this->category;
		}
	}



	public function renderEdit()
	{
        if (!$this->user->moderator) {
            throw new \Nette\Application\ForbiddenRequestException;
        }

		$this->template->category = $this->category;

		$this['editForm']['label']->setValue($this->category->label);
		$this['editForm']['description']->setValue($this->category->description);
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
        if (!$this->user->moderator) {
            throw new \Nette\Application\ForbiddenRequestException;
        }

		$v = $form->values;
		$c = $this->category;
		$c->label = $v->label;
		$c->slug = \Nette\Utils\Strings::webalize($c->label);
		$c->description = $v->description;
		$c->update();

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => [
			"categories",
			"category/$c->id",
			"category/" . $c->getParent()->id,
		]]);

		$this->redirect(':Front:Browse:');
	}



	public function handleAdd()
	{
        if (!$this->user->moderator) {
            throw new \Nette\Application\ForbiddenRequestException;
        }

        $video = $this->context->videos->findEmpty();
        if ($video) {
            $video->category_id = $this->id;
            $video->update();
        } else {
            $video = $this->context->videos->insert([
                'category_id' => $this->id,
            ]);
        }
		$this->redirect(':Front:Watch:edit', ['vid' => $video->id]);
	}



	public function handleUpdatePositions($videos)
	{
        if (!$this->user->moderator) {
            throw new \Nette\Application\ForbiddenRequestException;
        }

		$data = explode(',', $videos);
		$this->context->videos->updatePositions($data);

		if ($this->isAjax()) {
			$this->sendJson(['status' => 'success']);
		}

		$this->redirect('this');
	}

}
