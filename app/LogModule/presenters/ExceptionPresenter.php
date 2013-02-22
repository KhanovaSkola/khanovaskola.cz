<?php

namespace LogModule;

use Nette\Utils\Finder;


class ExceptionPresenter extends BaseLogPresenter
{

	public function renderDefault()
	{
		$this->template->errors = $this->getErrorList();
		$this->template->snooze_set = file_exists($this->getSnoozeFile());
	}



	public function renderShow($file)
	{
		$path = $this->getLogDir() . "/$file";
		if (!$file || !file_exists($path)) {
			$this->redirect('default');
		}

		$dump = file_get_contents($path);
		$this->sendResponse(new \Nette\Application\Responses\TextResponse($dump));
	}



	public function handleResetSnooze()
	{
		unlink($this->getSnoozeFile());
		$this->redirect('this');
	}



	protected function getErrorList()
	{
		$errors = [];
		foreach ($this->getDumps() as $dump) {
			$errors[] = $this->parseDump($dump);
		}
		usort($errors, function($a, $b) {
			return $a->ctime < $b->ctime;
		});
		return $errors;
	}



	protected function parseDump($file)
	{
		$res = file_get_contents($file->getRealPath());
		$match = [];
		preg_match('~<div id="netteBluescreenError" class="panel">\s*<h1>(?P<title>.*?)</h1>\s*<p>(?P<text>.*?)\s*<a~ims', $res, $match);

		$t = [];
		preg_match('~^exception-([0-9-]{4})-([0-9-]{2})-([0-9-]{2})-([0-9-]{2})-([0-9-]{2})-([0-9-]{2})~', $file->getFileName(), $t);

		return (object) [
			'title' => isset($match['title']) ? $match['title'] : '',
			'text' => isset($match['text']) ? $match['text'] : '',
			'file' => $file->getFileName(),
			'ctime' => mktime($t[4], $t[5], $t[6], $t[2], $t[3], $t[1]),
		];
	}



	protected function getDumps()
	{
		return Finder::findFiles('exception-*.html')->from($this->getLogDir());
	}



	protected function getLogDir()
	{
		return $this->context->parameters['appDir'] . '/../log';
	}



	protected function getSnoozeFile()
	{
		return $this->getLogDir() . "/email-sent";
	}

}
