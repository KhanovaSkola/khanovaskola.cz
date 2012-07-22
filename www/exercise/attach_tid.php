<?php

$path = __DIR__ . '/exercises';

$file_id = 1;
$node_id = 0;

foreach (scandir($path) as $name) {
	$file = "$path/$name";
	if (is_file($file)) {
		$template = file_get_contents($file);

		$matches = array();
		$template = preg_replace_callback('~
			(?P<prepend>
				<(p|title)
				(
					(
						\s+[a-z0-9-]+(
							\s*=\s*(?:
								".*?"
								|
								\'.*?\'
								|
								[^\'">\s]+
							)
						)?
					)+\s*
					|
					\s*
				)
			)
			(?P<append>
				/?>(?P<inner>.*?)</(\2)>
			)
		~imsx',
			function ($match) use ($file_id, &$node_id) {
				$node_id++;
				$tag = NULL;
				$code = array();

				// do not add the attribute to non-translatable nodes with only code or var tag
				if (! (preg_match('~^\s*<(code|var)>.*</\1>\s*$~ims', $match['inner'], $code) && strLen($code[0]) == strLen($match['inner']))) {
					$tag = " data-tid=\"$file_id.$node_id\"";
				}
				return $match['prepend'] . $tag . $match['append'];
			}, $template);

		file_put_contents($file, $template);

		$file_id++;
		$node_id = 0;
	}
}
