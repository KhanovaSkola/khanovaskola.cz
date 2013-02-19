<?php

use Nette\Diagnostics\Debugger;
use Nette\Application as NA;


/**
 * Error presenter.
 */
class ErrorPresenter extends BasePresenter
{

	/**
	 * @param  Exception
	 * @return void
	 */
	public function renderDefault($exception)
	{
		if ($this->isAjax()) { // AJAX request? Just note this error in payload.
			$this->payload->error = TRUE;
			$this->terminate();

		} elseif ($exception instanceof NA\BadRequestException) {
			$c = $exception->getCode();
			//$this->setView('error');
			$code = in_array($c, [403, 404, 405, 410, 500]) ? $c : '4xx';
			$this->template->code = $code;
			$this->setView($c);

			// log to access.log
			Debugger::log("HTTP code $code: {$exception->getMessage()} in {$exception->getFile()}:{$exception->getLine()}", 'access');

		} else {
			$this->setView('error');
			$this->template->code = 500;
			Debugger::log($exception, Debugger::ERROR); // and log exception
		}
	}

}
