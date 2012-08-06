<?php

/**
 * @property int	id
 */
abstract class Entity extends Nette\Database\Table\ActiveRow
{

	/** @var Nette\DI\Container */
	protected $context;



	public function __construct(array $data, Selection $table, Nette\DI\Container $context)
	{
		parent::__construct($data, $table);
		$this->context = $context;
	}

}
