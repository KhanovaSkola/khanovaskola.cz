<?php

namespace ModeratorModule;

use Nette\Caching\Cache;


class DashboardPresenter extends BaseModeratorPresenter
{

	public function renderDefault()
	{
		$cat = [];
		$cat['description'] = $this->context->categories->findBy(['description' => '']);
		$this->template->cat = $cat;

		$vid = [];
		$vid['description'] = $this->context->videos->findBy(['description' => '']);
		$vid['exercise'] = $this->context->videos->findBy(['exercise_id' => NULL]);
		$this->template->vid = $vid;

		$this->template->github = new \Github($this->context);
	}



	public function handleAddExercise()
	{
		$exercise = $this->context->exercises->insert([]);
		$this->redirect(':Front:Exercise:edit', ['eid' => $exercise->id]);
	}



	public function renderDetachedExercises()
	{
		$this->template->detached = $this->getDetachedExercises();
	}



	public function handlePopulateDb()
	{
		if (!$this->user->admin) {
			$this->redirect(':Moderator:Dashboard:');
		}

		foreach ($this->getDetachedExercises() as $file => $label) {
			$this->context->exercises->insert([
				'file' => $file,
				'label' => $label,
				'slug' => \Nette\Utils\Strings::webalize($label),
			]);
		}
		$this->redirect('this');
	}



	public function handleUpdateSlugs()
	{
		if (!$this->user->admin) {
			$this->redirect(':Moderator:Dashboard:');
		}

		foreach ($this->context->categories->findAll() as $category) {
			$category->slug = \Nette\Utils\Strings::webalize($category->label);
			$category->update();
		}

		foreach ($this->context->videos->findAll() as $video) {
			$video->slug = \Nette\Utils\Strings::webalize($video->label);
			$video->update();
		}

		foreach ($this->context->exercises->findAll() as $ex) {
			$ex->slug = \Nette\Utils\Strings::webalize($ex->label);
			$ex->update();
		}
	}



	private function getDetachedExercises()
	{
		$detached = [];
		$path = WWW_DIR . "/exercise/translated";

		foreach (scandir($path) as $fullfile) {
			if (in_array($fullfile, ['.', '..'])) {
				continue;
			}

			$file = substr($fullfile, 0, -5);
			$exercise = $this->context->exercises->findOneBy(['file' => $file]);
			if (!$exercise) {
				$template = file_get_contents("$path/$fullfile");
				$match = [];
				preg_match('~(?<=<title>).*?(?=</title>)~', $template, $match);
				$detached[$file] = $match[0];
			}
		}

		return $detached;
	}



	public function handleAttachToGithub()
	{
		if (!$this->user->admin) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$github = new \Github($this->context);
		$github->redirectAuth($this);
	}



	public function handleClearCache()
	{
		if (!$this->user->admin) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::ALL => TRUE]);

		$this->flashMessage('Cache byla smazána.');
		$this->redirect('this');
	}



	public function handleRefreshIssues()
	{
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ['issues']]);

		$this->flashMessage('List problému byl obnoven.');
	}



	public function handleTrimYoutubeIds()
	{
		if (!$this->user->admin) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$count = $this->context->videos->trimYoutubeIds();

		$this->flashMessage('Youtube_id bylo opraveno u ' . $count . ' videí.');
		$this->redirect('this');
	}

}
