<?php

class Articles extends Table
{

	public function findPublished($published = TRUE)
	{
		return $this->findAll()->where('is_published', $published)->order('datetime DESC');
	}

}
