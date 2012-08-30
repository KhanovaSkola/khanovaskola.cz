<?php

namespace Selenium;


abstract class TestCase extends \Nette\Object implements ICase
{

	/** @var \PHPWebDriver_WebDriverSession */
	protected $session;



	public function __construct(\PHPWebDriver_WebDriverSession $session)
	{
		$this->session = $session;
	}



	public function assertUrl($url)
	{
		if ($this->session->url() !== $url) {
			throw new TestException("Url assertion failed: `" . $this->session->url() . "` <> `$url`.");
		}
	}
}

class TestException extends \Exception {}
