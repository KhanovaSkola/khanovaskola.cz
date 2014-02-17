<?php

if (!isset($_GET['hash']))
{
	echo "unset hash\n";
	die;
}

$hash = $_GET['hash'];

$url = sprintf('https://www.versioneye.com/user/projects/%s/badge.png', $hash);

$image = file_get_contents($url);
$status = 'unknown';
foreach ($http_response_header as $header)
{
	if (strpos($header, 'Content-Disposition') === 0)
	{
		$match = [];
		if (preg_match('~filename="(?P<status>.*?)\.png"~', $header, $match))
		{
			$status = $match['status'];
			if ($status === 'dep_up-to-date')
			{
				header("Content-type: image/png");
				readfile(__DIR__ . "/$status.png");
				die;
			}
			break;
		}
	}
}

header("Content-type: image/png");
echo $image; // show original otherwise;
