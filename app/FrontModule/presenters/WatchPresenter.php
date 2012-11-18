<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;


class WatchPresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $vid;

	/** @var \Video */
	protected $video;

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

		$this->video = $this->context->videos->find($this->vid);

		if ($this->video && !$this->id) {
			$this->redirect(301, 'this', [
				'id' => $this->video->getOneCategoryId(),
			]);
		}

		$this->category = $this->context->categories->find($this->id);
		if (!$this->category || !$this->video || !$this->category->containsVideo($this->video)) {
			throw new \Nette\Application\BadRequestException;
		}
	}



	public function renderDefault($autoplay = 0)
	{
		$this->template->autoplay = $autoplay;
		$this->template->video = $this->video;
		$this->template->category = $this->category;
	}



	public function handleUpdateProgress($seconds)
	{
		if ($this->ajax && $this->user->loggedIn) {
			$this->user->entity->setProgress($this->video, $seconds, function() {
				// onVideoWatched
				$task = $this->user->entity->getTaskForVideo($this->video);
				if ($task && !$task->completed) {
					$cache = new Cache($this->context->cacheStorage);
					$cache->clean([Cache::TAGS => $this->task->getTagsToInvalidate()]);
					$task->setCompleted()->update();
				}
			});

			$cache = new Cache($this->context->cacheStorage);
			$cache->clean([Cache::TAGS => "watched/{$this->user->id}"]);

			$this->sendJson(['status' => 'success']);
		}

		$this->terminate();
	}



	public function renderEdit()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

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
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;
		$vid = $this->video;

		$vid->label = $v->label;
		$vid->slug = \Nette\Utils\Strings::webalize($v->label);
		$vid->description = $v->description;
		$vid->youtube_id = $v->youtube_id;

		$vid->update();

		$vid->updateTags($v['tags']);

		$invalid = ["videos", "video/$vid->id"];
		foreach ($vid->getCategoryIds() as $cat_id) {
			$invalid[] = "category/$cat_id";
		}
		foreach ($v['tags'] as $tag_id) {
			$invalid[] = "tag/$tag_id";
		}
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $invalid]);

		$this->redirect('default');
	}

}
