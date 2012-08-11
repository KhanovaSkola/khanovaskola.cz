<?php

namespace ApiModule;


class DocumentationPresenter extends \BasePresenter
{

	public function startup()
	{
		$this->redirectUrl('http://docs.khanovaskola.apiary.io/');
	}

}
