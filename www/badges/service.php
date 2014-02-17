<?php

$service = $_GET['service'];
if (preg_match('~\btravis-ci.org\b~i', $service))
{
	switch (getFilenameHeader($service))
	{
		case 'error':
			serve('build', 'error', 'red');
		case 'failing':
			serve('build', 'failing', 'red');
		case 'passing':
			serve('build', 'passing', 'brightgreen');
		case 'pending':
			serve('build', 'pending', 'lightgrey');
		case 'unknown':
			serve('build', 'unknown', 'lightgrey');
	}
}
else if (preg_match('~\bcoveralls.io\b~i', $service))
{
	$val = getLocationHeader($service);
	if ((string)(int)$val !== (string)$val) {
		serve('coverage', $val, 'lightgrey');
	} else if ($val > 90) {
		serve('coverage', "$val %", 'brightgreen');
	} else if ($val > 80) {
		serve('coverage', "$val %", 'yellow');
	} else {
		serve('coverage', "$val %", 'red');
	}
}
else if (preg_match('~\bversioneye.com\b~i', $service))
{
	switch (getFilenameHeader($service))
	{
		case 'dep_up-to-date':
			serve('dependencies', "up to date", 'brightgreen');
		case 'dep_out-of-date':
			serve('dependencies', "out of date", 'orange');
	}
}

function serve($key, $value, $color)
{
	$url = 'https://khancdn.eu/badges.php?' . http_build_query([
		'key' => $key,
		'value' => $value,
		'color' => $color,
	]);
	header("location: $url");
	die;
}

function getLocationHeader($url)
{
	file_get_contents($url);
	$status = 'unknown';
	foreach ($http_response_header as $header)
	{
		if (strpos($header, 'Location') === 0)
		{
			$match = [];
			if (preg_match('~coveralls_(?P<value>.*?)\.png~', $header, $match))
			{
				return $match['value'];
			}
		}
	}
	return NULL;
}

function getFilenameHeader($url)
{
	file_get_contents($url);
	$status = 'unknown';
	foreach ($http_response_header as $header)
	{
		if (strpos($header, 'Content-Disposition') === 0)
		{
			$match = [];
			if (preg_match('~filename="(?P<status>.*?)\.png"~', $header, $match))
			{
				return $match['status'];
			}
		}
	}
	return NULL;
}
