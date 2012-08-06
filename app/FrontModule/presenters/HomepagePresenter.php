<?php

namespace FrontModule;


class HomepagePresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->categories = $this->context->categories->findRoot();
		$this->template->featured_video = $this->context->videos->findRandom();
	}



	/** @todo rewrite */
	public function actionGithubCallback($code)
	{
		$github = new \Github($this->context);
		if ($code) {
			$auth = $github->tradeCodeForAuth($code);
			var_dump($auth);
		}
		die;
	}

}
