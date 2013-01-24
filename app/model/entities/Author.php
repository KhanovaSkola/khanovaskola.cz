<?php

/**
 * @property string	$name
 * @property string	$role 	enum(dubbing)
 */
class Author extends Entity
{

	public function getNbName()
	{
		return str_replace(' ', '&nbsp;', htmlspecialchars($this->name));
	}

}
