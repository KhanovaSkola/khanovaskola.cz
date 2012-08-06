<?php

class Categories extends Table
{

	/**
	 * @param array $by
	 * @return Category
	 */
	public function findRoot()
	{
		return $this->getTable()->where(['parent_id' => NULL]);
	}

}
