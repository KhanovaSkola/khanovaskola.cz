<?php

namespace FrontModule;


class HomepagePresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->categories = $this->context->categories->findRoot();
		$this->template->featured_video = $this->context->videos->findRandom();
	}



	public function actionGone()
	{
		throw new \Nette\Application\BadRequestException('Gone', 410);
	}



	/** @todo rewrite */
	public function actionGithubCallback($code)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_ADMIN)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$github = new \Github($this->context);
		if ($code) {
			$auth = $github->tradeCodeForAuth($code);
			var_dump($auth);
		}
		die;
	}



	public function getBacklink()
	{
		return NULL;
	}

}
