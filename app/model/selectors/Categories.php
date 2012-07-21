<?php

class Categories extends Table
{
	
	/**
	 * @param array $by
	 * @return \Nette\Database\Table\Selection
	 */
	public function findRoot()
	{
		return $this->getTable()->where(['parent_id' => NULL]);
	}
	
}
