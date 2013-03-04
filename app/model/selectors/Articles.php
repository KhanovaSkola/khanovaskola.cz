<?php

namespace Selector;


class Articles extends \ORM\Table
{

	public function findPublished($published = TRUE)
	{
		return $this->findAll()->where('is_published', $published)->order('datetime DESC');
	}

}
