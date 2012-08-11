<?php

namespace FrontModule;


class TagPresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $tid;



	public function renderDefault()
	{
		$this->template->tag = $this->context->tags->findOneBy(['id' => $this->tid]);
	}

}
