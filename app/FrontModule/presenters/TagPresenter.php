<?php

namespace FrontModule;


class TagPresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $tid;

	/** @var \Tag */
	protected $tag;



	public function startup()
	{
		parent::startup();
		$this->tag = $this->context->tags->find($this->tid);
		if (!$this->tag) {
			throw new \Nette\Application\BadRequestException;
		}
	}


	public function renderDefault()
	{
		$this->template->tags = $this->context->tags->findBy(['display' => TRUE]);
		$this->template->selected = $this->tag;
	}

}
