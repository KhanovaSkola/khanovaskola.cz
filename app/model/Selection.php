<?php

class Selection extends Nette\Database\Table\Selection
{

	/** @var Nette\DI\Container */
	protected $context;



	public function __construct($table, Nette\Database\Connection $connection, Nette\DI\Container $context)
	{
		parent::__construct($table, $connection);
		$this->context = $context;
	}



	protected function createRow(array $row)
	{
		$class = ucfirst($this->name);
		if (class_exists($class)) {
			return new $class($row, $this, $this->context);
		}

		return new \Nette\Database\Table\ActiveRow($row, $this);
	}

	/** @todo Re Implement insert method to also return proper entities */
}
