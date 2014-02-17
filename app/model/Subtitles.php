<?php

namespace Model;

use Entity\Video;
use Nette\Object;
use Nette\Database as Db;
use Nette\Utils\Strings as String;


class Subtitles extends Object
{

	private $db;


	public function __construct(Db\Connection $db)
	{
		$this->db = $db;
	}

	public function get(Video $video)
	{
		$srt = $this->db->queryArgs('
				SELECT data FROM subtitles
				WHERE youtube_id = ? AND revision = ?',
				[$video->youtube_id, $video->revision]
			)->fetch()['data'];

		$data = [];

		$srt = String::normalize($srt);
		$srt = substr($srt, 2); // remove first line with only "1"

		foreach (preg_split('~\n{2}\d+\n~m', $srt) as $node)
		{
			$node = trim($node); // just to make sure
			$matches = [];
			preg_match('~^\s*(?P<start>\d+:\d+:\d+,\d+)\s*.*?\s*(?P<end>\d+:\d+:\d+,\d+)\s+(?P<text>.*)~s', $node, $matches);

			$data[] = (object) [
				'text' => trim($matches['text']),
				'start_time' => $this->normalizeTime($matches['start']),
				'end_time' => $this->normalizeTime($matches['end']),
			];
		}
		return $data;
	}



	private function normalizeTime($time)
	{
		// 00:00:00.464
		// 00:00:00,464
		$time = str_replace(',', '.', $time);
		list($h, $m, $s) = explode(':', $time);
		return (int) (($h * 3600 + $m * 60 + $s) * 1000);
	}

}
