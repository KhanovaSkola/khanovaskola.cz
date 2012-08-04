<?php

namespace FrontModule;

use Nette\Application\UI\Form;

class WatchPresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var public
	 */
	public $vid;
	
	/** @var Video */
	protected $video;
	
	
	
	public function startup()
	{
		parent::startup();
		$this->video = $this->context->videos->findOneBy(['id' => $this->vid]);
	}
	
	
	
	public function renderDefault()
	{
		$this->template->video = $this->video;
	}
	
	
	
	public function renderEdit()
	{
		$form = $this['editForm'];
		$vid = $this->video;
		
		$form['label']->setValue($vid->label);
		$form['description']->setValue($vid->description);
		$form['youtube_id']->setValue($vid->youtube_id);
	}
	
	
	
	public function createComponentEditForm($name)
	{
		$form = new Form($this, $name);
	
		$form->addText('label', 'Název');
		$form->addTextArea('description', 'Popis');
		$form->addText('youtube_id', 'Youtube ID');
		
		$form->addSubmit('send');
		$form->onSuccess[] = callback($this, 'onSuccessEditForm');
		
		return $form;
	}
	
	
	
	public function onSuccessEditForm(Form $form)
	{
		$v = $form->values;
		$vid = $this->video;
		
		$vid->label = $v->label;
		$vid->slug = \Nette\Utils\Strings::webalize($v->label);
		$vid->description = $v->description;
		$vid->youtube_id = $v->youtube_id;
		
		$vid->update();
		
		$this->redirect(':Front:Watch:');
	}

}
