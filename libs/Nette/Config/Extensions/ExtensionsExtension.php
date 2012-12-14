<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 *
 * Copyright (c) 2004 David Grudl (http://davidgrudl.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace Nette\Config\Extensions;

use Nette;



/**
 * Enables registration of other extensions in $config file
 *
 * @author  Vojtech Dobes
 */
class ExtensionsExtension extends Nette\Config\CompilerExtension
{

	public function loadConfiguration()
	{
		foreach ($this->getConfig() as $name => $class) {
			$this->compiler->addExtension($name, new $class);
		}
	}

}
