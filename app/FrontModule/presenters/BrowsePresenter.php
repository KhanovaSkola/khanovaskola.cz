<?php

namespace FrontModule;



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

}
