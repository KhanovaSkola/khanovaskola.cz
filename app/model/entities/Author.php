<?php

/**
 * @property string	$name
 * @property string	$role 	enum(dubbing)
 */
class Author extends Entity
{

	const ROLE_DUBBING = 'dubbing';



	public function getNbName()
	{
		return str_replace(' ', '&nbsp;', htmlspecialchars($this->name));
	}

}
