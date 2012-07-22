<?php

namespace FrontModule;

use Nette\Application\UI\Form;

class BrowsePresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $id;
	
	/** @var Category */
	protected $category;
	
	
	
	public function startup()
	{
		parent::startup();
		$this->category = $this->context->categories->findOneBy(['id' => $this->id]);
		
		if (!$this->category || $this->category->isSubject()) {
			// those are not rendered
			$this->redirect(':Front:Homepage:');
		}
	}
	
	
	
	public function renderDefault()
	{
		$this->template->selected = $this->id;
		if ($this->category->isLeaf()) {
			$this->template->category = $this->category->getParent();
			$this->template->leaf = $this->category;
			
		} else { // isSubcategory
			$this->template->category = $this->category;
		}
	}
	
	
	
	public function renderEdit()
	{
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
		$v = $form->values;
		$c = $this->category;
		$c->label = $v->label;
		$c->description = $v->description;
		$c->update();
		
		$this->redirect(':Front:Browse:');
	}

}
