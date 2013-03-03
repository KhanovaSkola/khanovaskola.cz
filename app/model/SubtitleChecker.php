<?php

use Nette\Caching\Cache;


class SubtitleChecker extends Nette\Object
{

	/** @var Amara */
	protected $amara;



	public function __construct(Amara $amara)
	{
		$this->amara = $amara;
	}



	public function getErrors(Video $video)
	{
		$subs = $this->amara->getSubtitles($video);
		$text = '';
		foreach ($subs as $node) {
			$text .= "$node->text\n";
		}

		$patterns = [
			'ellipsis' => '\.{3,}',
			'quotes' => '\".*?\"',
			'multiple-spaces' => '[ ]{2,}',
			//'dash' => '--+',
			'minus' => '\d\s*-\s*\d',
			//'punc-space' => '([ ]+[,.]|[,.][ ]{2,}|[ ]+[,.][ ]{2,})',

			// add rules for:
			//  - thousands separator
			//	- capitalized words			
		];
		$pattern = '(' . implode(')|(', $patterns) . ')';
		$matches = [];
		preg_match_all("~^.*(?:$pattern).*$~im", $text, $matches);

		$lines = [];
		foreach ($matches[0] as $line) {
			$highlight = [];
			preg_match_all("~$pattern~im", $line, $highlight);
			unset($highlight[0]);
			foreach (array_keys($highlight[1]) as $i) {
				$value = NULL;
				foreach ($highlight as $type => $node) {
					if ($node[$i]) {
						$value = $node[$i];
						break;
					}
				}
				switch (array_keys($patterns)[$type - 1]) {
					case 'ellipsis':
						$line = preg_replace('~\.{3,}~im', '<span class="error">&hellip;</span>', $line);
						break;
					case 'quotes':
						$line = preg_replace('~"(.*?)"~im', '<span class="error">&bdquo;</span>\1<span class="error">&ldquo;</span>', $line);
						break;
					case 'multiple-spaces':
						$line = preg_replace('~"[ ]{2,}"~im', '<span class="error"> </span>', $line);
						break;
					case 'dash':
						$line = preg_replace('~-+~im', '<span class="error">&ndash;</span>', $line);
						break;
					case 'minus':
						$line = preg_replace('~\d\s*-\s*\d~im', '<span class="error">&minus;</span>', $line);
						break;
				}
			}

			$lines[] = $line;
		}

		return $lines;
	}

}
