<?php

class Categories extends Table
{

	/**
	 * @param array $by
	 * @return Category
	 */
	public function findRoot()
	{
		return $this->findBy(['parent_id' => NULL]);
	}



	public function findLeaves()
	{
		$ids = [];
		foreach ($this->context->database->table('video')->select('category_id')->group('category_id') as $row) {
			$ids[] = $row['category_id'];
		}

		return $this->findBy(['id' => $ids]);
	}

}
