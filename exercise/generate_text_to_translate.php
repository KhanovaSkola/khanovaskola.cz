<?php

$path = __DIR__ . '/exercises';

foreach (scandir($path) as $name) {
	$file = "$path/$name";
	if (is_file($file)) {
		$template = file_get_contents($file);

		$matches = array();

		$template = preg_match_all('~
			<(p|title)
			.*?
			\ data-tid="(?P<tid>\d+\.\d+)"
			/?>(?P<inner>.*?)</(\1)>
		~imsx', $template, $matches);

		$phrases = array();

		foreach ($matches['tid'] as $i => $tid) {
			$phrases[$tid] = trim($matches['inner'][$i]);
		}

		$text = "";
		foreach ($phrases as $tid => $phrase) {
			$text .= "$tid \t $phrase\n\n";
		}

		$info = pathinfo($file);
		file_put_contents(__DIR__ . '/translate/' . $info['filename'] . '.txt', $text);
	}
}
