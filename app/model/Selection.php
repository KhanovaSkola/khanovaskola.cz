<?php

namespace ORM;


class Selection extends \Nette\Database\Table\Selection
{

	/** @var Nette\DI\Container */
	protected $context;



	public function __construct($table, \Nette\Database\Connection $connection, \Nette\DI\Container $context)
	{
		parent::__construct($connection, $table, new \Nette\Database\Reflection\ConventionalReflection);
		$this->context = $context;
	}



	protected function createRow(array $row)
	{
		$class = "\\Entity\\" . ucfirst($this->name);
		if ($class === "\Entity\Exercise_translation") {
			$class = "\\Entity\\Translation";
		}

		if (class_exists($class)) {
			return new $class($row, $this, $this->context);
		}

		return new \Nette\Database\Table\ActiveRow($row, $this);
	}

	/** @todo Re Implement insert method to also return proper entities */
}
