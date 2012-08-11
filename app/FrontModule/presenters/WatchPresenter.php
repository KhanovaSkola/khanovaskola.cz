<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;


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
		$form['tags']->setValue($vid->getTagsIds());
	}



	public function createComponentEditForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('label', 'Název');
		$form->addTextArea('description', 'Popis');
		$form->addText('youtube_id', 'Youtube ID');
		$form->addMultiSelect('tags', 'Tagy', $this->context->tags->getFill());

		$form->addSubmit('send', 'Upravit');
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

		$vid->updateTags($v['tags']);

		$invalid = ["videos", "video/$vid->id"];
		foreach ($v['tags'] as $tag_id) {
			$invalid[] = "tag/$tag_id";
		}
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $invalid]);

		$this->redirect(':Front:Watch:');
	}

}
