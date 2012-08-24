<?php

namespace TabletModule;


abstract class BaseTabletPresenter extends \BasePresenter
{

	public function startup()
	{
		parent::startup();

        $this->setLayout('layout_tablet');

        if (FALSE && !$this->isMobile()) {
            $this->redirect('Homepage:');
        }
	}

}
