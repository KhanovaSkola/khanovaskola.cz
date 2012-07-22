<?php

$path = __DIR__ . '/exercises';

foreach (scandir($path) as $name) {
	$file = "$path/$name";
	if (is_file($file)) {
		$template = file_get_contents($file);

		$matches = array();
		$template = preg_replace('~
			<!DOCTYPE\ html>\s*
			<html\ data-require="(?P<require>.*?)">\s*
			<head>\s*
			    <meta\ http-equiv="Content-Type"\ content="text/html;\ charset=UTF-8">\s*
			    <title\ data-tid="\d+\.\d+">(?P<title>.*?)</title>\s*
			    <script\ src="\.\./khan-exercise\.js"></script>\s*
			</head>\s*
			<body>\s*
		~imsx',
			"<!-- \nrequires: \\1\ntitle: \\2\n-->\n"
			, $template);
		$template = preg_replace('~\s*</body>\s*</html>\s*~ims', "\n", $template);

		echo $template;die;
		file_put_contents($file, $template);
	}
}
