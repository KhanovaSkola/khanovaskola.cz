<?php

/**
 * @property string	$label
 * @property string	$text
 * @property string	$datetime
 * @property bool $is_published
 */
class Article extends Entity
{

	public function getSplitText()
	{
		$text = str_replace("\r", "", $this->text);
		return preg_split("~\n{2,}~", $text);
	}



	public function setPublished($published = TRUE)
	{
		$this->is_published = $published;
		$this->update();
	}

}
