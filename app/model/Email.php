<?php

use Nette\Mail\Message;


class Email extends Nette\Object
{

	/** @var User */
	protected $user;



	public function __construct(User $user)
	{
		$this->user = $user;
	}



	public function sendPasswordReset($link)
	{
		$template = $this->getTemplate('passReset');
		$template->link = $link;

		$mail = new Message();
		$mail->setFrom('Khanova škola <heslo@khanovaskola.cz>')
			->addTo("{$this->user->name} <{$this->user->mail}>")
			->setSubject('Ztracené heslo')
			->setHtmlBody($template)
			->send();
	}



	protected function getTemplate($name)
	{
		$file = APP_DIR . "/templates/_emails/$name.latte";

		$template = new Nette\Templating\FileTemplate($file);
		$template->registerFilter(new Nette\Latte\Engine);

		return $template;
	}

}
