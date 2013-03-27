<?php

namespace NewRelic;

use Nette;


class RouteList extends Nette\Application\Routers\RouteList
{

	public function match(Nette\Http\IRequest $httpRequest)
	{
		$t = '_Nette.routing.match';
		Nette\Diagnostics\Debugger::timer($t);
		$match = parent::match($httpRequest);
		$elapsed = Nette\Diagnostics\Debugger::timer($t) * 1000;

		if (extension_loaded('newrelic')) {
			newrelic_custom_metric('Nette/Routing', $elapsed);
		}

		return $match;
	}

}
