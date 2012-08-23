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

}
