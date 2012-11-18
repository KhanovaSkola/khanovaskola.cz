<?php

use Nette\Utils\Strings as String;


class SrtParser extends \Nette\Object
{
	const ID = 0;
	const TIMES = 1;
	const CONTENT = 2;
	const DELIMITER = 3;


	public static function parse($srt)
	{
		$res = [];
		$expect = self::ID;
		$node = [];

		foreach (explode("\n", $srt) as $line) {
			switch ($expect) {
				case self::ID:
					$node['id'] = (int) $line;
					break;
				case self::TIMES:
					@list($s, $e) = explode(' --> ', $line);
					if (!$s || !$e) {
						goto skip; // probably commentary
					}
					$node['start'] = self::parseTime($s);
					$node['end'] = self::parseTime(trim($e));
					break;
				case self::CONTENT:
					$node['content'] = trim($line);
					break;
				case self::DELIMITER:
					$res[] = (object) $node;
					$expect = -1;
					break;
			}
			$expect++;
			skip:
		}

		return $res;
	}



	private static function parseTime($time)
	{
		list($h, $m, $s) = explode(':', $time);
		return $h * 3600 + $m * 60 + str_replace(',', '.', $s);
	}

}
