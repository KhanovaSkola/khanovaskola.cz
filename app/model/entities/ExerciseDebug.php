<?php

namespace Entity;


class ExerciseDebug extends \Nette\Object
{

	public $id = 0;

	public $file;

	public $label;



	public function __construct($file)
	{
		$this->file = $file;
		$this->label = "DEBUG $file";
	}



	public function getCategories()
	{
		return [];
	}



	/**
	 * @return Video[]
	 */
	public function getRelatedVideos()
	{
		return [];
	}


	/**
	 * @return string
	 */
	public function getDescription()
	{
		return "Cvičení {$this->label} na Khanově škole.";
	}



	/**
	 * @return int[]
	 */
	public function getCategoryIds()
	{
		return [];
	}



	/**
	 * @param array $cats
	 * @return bool
	 */
	public function updateCategories(array $cats)
	{
		return FALSE;
	}

}
