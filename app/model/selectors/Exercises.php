<?php

class Exercises extends Table
{

	/**
	 * @param array $columns
	 * @param $query
	 * @return Exercise[]
	 */
	public function findInAny(array $columns, $query)
	{
		$filters = [];
		$args = [];
		foreach ($columns as $col) {
			$filters[] = "$col LIKE ?";
			$args[] = "%$query%";
		}

		$query = $this->getTable()->where(implode(" OR ", $filters), $args);
		return $query;
	}



	/**
	 * @param Category $category
	 * @return Exercise[]
	 */
	public function findByCategory(Category $category)
	{
		$ids = $category->getExerciseIds();
		return $this->findBy(['id' => $ids])
			->order('FIELD(id,' . implode(',', $ids) . '), id');
	}



	public function findWithoutCategory()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT DISTINCT exercise_id FROM category_exercise') as $row) {
			$ids[] = (int) $row['exercise_id'];
		}
		return $this->findBy(['id NOT' => $ids]);
	}

}
