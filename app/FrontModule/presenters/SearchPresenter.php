<?php

namespace FrontModule;


class SearchPresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $q;



	public function startup()
	{
		if (!$this->q && $this->action === 'default') {
			$this->redirect(':Front:Homepage:');
		}

		parent::startup();
	}



	public function renderDefault()
	{
		$this->template->query = $this->q;
	}



	public function renderCustom()
	{
		$this->template->query = $this->q;

		$query = str_replace(['%', '_'], ['\%', '\_'], $this->q);
		$this->template->videos = $this->context->videos->findInAny([
			'label', 'description', 'youtube_id'
		], $query);
		$this->template->exercises = $this->context->exercises->findInAny([
			'label'
		], $query);
	}



	public function renderAutocomplete($startsWith)
	{
		$res = $this->context->autocomplete->whisper($startsWith)->limit(10);
		$words = [];
		foreach ($res as $row) {
			$words[] = $row['label'];
		}
		$this->sendJson(['results' => $words]);
	}

}