<?php

if (isset($_GET['service']))
{
	require __DIR__ . '/badges/service.php';
	die;
}
require __DIR__ . '/badges/index.php';
