<?php

// I know it's de-facto public, it's mainly targeting web robots and search engines
if (!isset($_COOKIE['staging_access']) || $_COOKIE['staging_access'] !== 'allowed') {
	echo "Denied";
	http_response_code(403);
	die;
}

require __DIR__ . '/index.php';
