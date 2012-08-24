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
                    list($node['start'], $node['end']) = explode(' --> ', $line);
                    break;
                case self::CONTENT:
                    $node['content'] = trim($line);
                    break;
                case self::DELIMITER:
                    $res[] = $node;
                    $expect = -1;
                    break;
            }
            $expect++;
        }

        return $res;
    }

}
