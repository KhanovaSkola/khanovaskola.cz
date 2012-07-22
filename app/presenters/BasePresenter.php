<?php

abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	public function createComponentDialog($name)
	{
		return new DialogControl($this, $name);
	}
	
}
