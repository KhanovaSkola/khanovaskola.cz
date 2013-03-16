<?php

namespace Entity;


class ExerciseDebug extends \Nette\Object
{

	public $id = 0;

	public $file;

	public $label;



	private $context;



	public function __construct($context, $file)
	{
		$this->context = $context;
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



	public function getTranslation()
	{
		return $this->context->translations->findLatestFor($this->file);
	}



	public function getHtmlTemplate()
	{
		$t = $this->getTranslation();
		if ($t) {
			return $t->template;
		}

		return file_get_contents(WWW_DIR . "/exercise/translated/{$this->file}.html");
	}

}
