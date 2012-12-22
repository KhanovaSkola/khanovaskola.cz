<?php

namespace Control;


class Github extends \BaseControl
{

	public function renderIssues($issues)
	{
		$this->template->setFile(__DIR__ . '/template.latte');
		$this->template->issues = $issues;
		$this->template->render();
	}

}
