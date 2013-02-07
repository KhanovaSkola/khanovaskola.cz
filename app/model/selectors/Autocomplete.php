<?php

use Nette\Utils\Strings;


class Autocomplete extends Table
{

	public function insert($data)
	{
		throw new \Nette\NotSupportedException();
	}



	public function whisper($string)
	{
		return $this->findBy(['label COLLATE utf8_general_ci LIKE ?' => "%" . str_replace(' ', '%', $string) . "%"])->select('Concat(Lower(Substr(label, 1, 1)), Substr(label, 2)) AS `label`');
	}

}
