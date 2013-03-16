<?php

namespace Selector;


class Translations extends \ORM\Table
{

	public function findLatestFor($file)
	{
		return $this->findBy(['file' => $file])->order('timestamp DESC')->limit(1)->fetch();
	}

}
