<?php

namespace Selenium;


class Login extends TestCase
{

	public function run()
	{
		$this->session->deleteAllCookies();
		$this->session->open('http://localhost/prihlaseni');

		//$anchor_google = $this->session->element(\PHPWebDriver_WebDriverBy::XPATH, '//*[@id="login-google"]/div/a');
		$username = $this->session->element(\PHPWebDriver_WebDriverBy::XPATH, '//*[@id="frm-signInForm-username"]');
		$password = $this->session->element(\PHPWebDriver_WebDriverBy::XPATH, '//*[@id="frm-signInForm-password"]');

		$username->sendKeys('mikulas@dite.cz');
		$password->sendKeys('q');
		$password->sendKeys(\PHPWebDriver_WebDriverKeys::EnterKey());

		$this->assertUrl('http://localhost/moderator/');
	}

}
