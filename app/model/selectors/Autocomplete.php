<?php

class Autocomplete extends Table
{

	public function insert($data)
	{
		throw new \Nette\NotSupportedException();
	}



	public function whisper($string)
	{
		return $this->findBy(['label REGEXP ?' => "^(.* )?" . preg_quote($string)])->select('Concat(Lower(Substr(label, 1, 1)), Substr(label, 2)) AS `label`');
	}

}
