<?php

namespace TabletModule;


abstract class BaseTabletPresenter extends \BasePresenter
{

	public function startup()
	{
		parent::startup();

        $subs = $this->context->videos->find(3)->getSubtitles();
        dump($subs);
        die;

        $this->setLayout('layout_tablet');

        if (FALSE && !$this->isMobile()) {
            $this->redirect('Homepage:');
        }
	}

}
