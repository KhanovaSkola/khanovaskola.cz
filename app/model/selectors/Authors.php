<?php

namespace Selector;


class Authors extends \ORM\Table
{

	/**
	 * @return array
	 */
	public function getFill()
	{
		$rows = ['Bez dabingu'];
		$rows += $this->findAll()->order('name')->fetchPairs('id', 'name');
		return $rows;
	}

}
