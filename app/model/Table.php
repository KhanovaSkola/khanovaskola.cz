<?php

namespace ORM;


class Table extends \Nette\Object
{

	/** @var Nette\Database\Connection */
	protected $connection;

	/** @var Nette\DI\Container */
	protected $context;

	/** @var string */
	protected $tableName;


	/**
	 * @param $tableName
	 * @param Nette\Database\Connection $db
	 */
	public function __construct($tableName, \Nette\Database\Connection $db, \Nette\DI\Container $context)
	{
		$this->tableName = $tableName;
		$this->connection = $db;
		$this->context = $context;
	}



	/**
	 * @return Selection
	 */
	protected function getTable()
	{
		return new Selection($this->tableName, $this->connection, $this->context);
	}



	/**
	 * @param array $data
	 * @return \Nette\Database\Table\ActiveRow
	 */
	public function insert($data)
	{
		return $this->getTable()->insert($data);
	}



	/**
	 * @return Selection
	 */
	public function findAll()
	{
		return $this->getTable();
	}



	/**
	 * @param array $by
	 * @return Selection
	 */
	public function findBy(array $by)
	{
		return $this->getTable()->where($by);
	}



	/**
	 * @param array $by
	 * @return Nette\Database\Table\ActiveRow|FALSE
	 */
	public function findOneBy(array $by)
	{
		return $this->findBy($by)->limit(1)->fetch();
	}



	/**
	 * @param int $id
	 * @return Nette\Database\Table\ActiveRow|FALSE
	 */
	public function find($id)
	{
		return $this->findOneBy(['id' => $id]);
	}



	public function findBySlug($slug)
	{
		$class = explode('\\', strToLower(get_class($this)));

		switch(end($class)) {
			case 'articles':
				$type = 'article';
				break;
			case 'categories':
				$type = 'category';
				break;
			case 'exercises':
				$type = 'exercise';
				break;
			case 'tags':
				$type = 'tag';
				break;
			case 'videos':
				$type = 'video';
				break;
			default:
				throw new \Nette\InvalidArgumentException("Class " . get_class($this) . " does not support slugs.");
		}
		foreach ($this->context->database->query('SELECT * FROM url WHERE slug=? AND type=?', $slug, $type) as $row) {
			return $this->find($row['entity_id']);
		}
	}
}
