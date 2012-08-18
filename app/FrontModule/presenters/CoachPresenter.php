<?php

namespace FrontModule;


class CoachPresenter extends BaseFrontPresenter
{

	public function startup()
	{
		if (!$this->user->loggedIn && $this->action != 'aboutFeature') {
			$this->redirect('aboutFeature');
		}

		parent::startup();
	}

}
