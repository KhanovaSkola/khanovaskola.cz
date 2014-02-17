<?php

if (!isset($_GET['user']) || !isset($_GET['repo']))
{
	echo "unset user || repo\n";
	die;
}

$user = $_GET['user'];
$repo = $_GET['repo'];
$branch = isset($_GET['branch']) ? $_GET['branch'] : 'master';

$url = sprintf('https://api.travis-ci.org/%s/%s.png?branch=%s', $user, $repo, $branch);

file_get_contents($url);
$status = 'unknown';
foreach ($http_response_header as $header)
{
	if (strpos($header, 'Content-Disposition') === 0)
	{
		$match = [];
		if (preg_match('~filename="(?P<status>.*?)\.png"~', $header, $match))
		{
			$status = $match['status'];
			break;
		}
	}
}

header("Content-type: image/png");
readfile(__DIR__ . "/$status.png");
