<?php

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	
	public function getUrl()
	{
		return (string) $this->getHttpRequest()->getUrl();
	}
	
	

	public function createComponentDialog($name)
	{
		return new DialogControl($this, $name);
	}
	
}
