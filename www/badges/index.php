<?php

use Nette\Templating\FileTemplate;

require __DIR__ . '/vendor/autoload.php';

$svg = new FileTemplate(__DIR__ . '/shield.svg');
$svg->registerFilter(new Nette\Latte\Engine);

$colors = [
	// 'grey' => ,
	'brightgreen' => ['#9DED7D', '#4AD115', '#31B70E', '#23630A'],
	// 'green' => [D1F171, 97CA00, 6B8F00, 4D6700],
	// 'yellowgreen' => [FFE37F, E0B417, 9E7F10, 725C0C],
	'yellow' => ['#FFE37F', '#E0B417', '#9E7F10', '#725C0C'],
	// 'orange' => '#B87125',
	'red' => ['#FFAC9C', '#E05D44', '#9E4230', '#722F22'],
	'lightgrey' => ['#D6D6D6', '#9F9F9F', '#707070', '#515151'],
	'blue' => ['#AADFEF', '#4BB3E5', '#398FCD', '#2280BB'],
];


if (!isset($_GET['key']))
{
	die(json_encode(['error' => 'Missing argument key.']));
}
$key = $_GET['key'];
if (!isset($_GET['value']))
{
	die(json_encode(['error' => 'Missing argument value.']));
}
$value = $_GET['value'];
if (!isset($_GET['color']))
{
	die(json_encode(['error' => 'Missing argument color.']));
}
$color = $_GET['color'];
if (!in_array($color, array_keys($colors)))
{
	die(json_encode(['error' => 'Invalid value for argument color.', 'expected' => array_keys($colors)]));
}

$marginOuter = 5;
$marginInner = 4;

$widthLeft = $marginOuter + computeTextWidth($key) + $marginInner;
$widthRight = $marginInner + computeTextWidth($value) + $marginOuter;
$width = $widthLeft + $widthRight;

$color = $colors[$color];

// $svg->margin = (object) ['inner' => $marginInner, 'outer' => $marginOuter];

$svg->width = (object) ['left' => $widthLeft, 'right' => $widthRight];
$svg->widthSum = $svg->width->left + $svg->width->right;

$svg->center = $widthLeft;

$svg->pos = (object) ['key' => $marginOuter, 'value' => $widthLeft + $marginInner];

$svg->color = $color;

$svg->key = $key;
$svg->value = $value;

$svg->fontTtf = base64_encode(file_get_contents(__DIR__ . '/OpenSans-Regular.ttf'));
$svg->fontWoff = base64_encode(file_get_contents(__DIR__ . '/OpenSans-Regular.woff'));
$svg->fontEot = base64_encode(file_get_contents(__DIR__ . '/OpenSans-Regular.eot'));
// $style = file_get_contents('https://fonts.googleapis.com/css?family=Open+Sans'); // TODO CACHE
// $baseUrl = "url(\"data:application/font-woff;charset=utf-8;base64,$fontData\")";
// $style = str_replace("format('woff')", "$baseUrl format('woff')", $style);
// $svg->style = $style;

header('Content-Type: image/svg+xml');
$svg->render();

function computeTextWidth($text)
{
	/** @see http://www.php.net/imagettfbbox */
	// lower left x, lower right x
	list($llx, $tmp, $lrx) = imagettfbbox(10, 0, __DIR__ . '/OpenSans-Regular.ttf', $text);
	return ($lrx - $llx) * .85; // precision fix
}
