<?php

namespace ORM;


/**
 * @property int	id
 */
abstract class Entity extends \Nette\Database\Table\ActiveRow
{

	/** @var \Nette\DI\Container */
	protected $context;



	public function __construct(array $data, Selection $table, \Nette\DI\Container $context)
	{
		parent::__construct($data, $table);
		$this->context = $context;
	}



	protected function getTableName()
	{
		$cls = explode('\\', strToLower(get_class($this)));
		return end($cls);
	}



	/**
	 * @return bool
	 */
	public function isEqualTo(Entity $entity)
	{
		if (get_class($entity) !== get_class($this)) {
			return FALSE;
		}

		return $this->id === $entity->id;
	}

}
