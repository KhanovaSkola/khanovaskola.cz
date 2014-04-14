<?php

/**
 * Entities: slug
 */

use Tester\Assert;
require __DIR__ . '/../bootstrap.php';


$slug = 'nadpis';
$slug2 = 'another';

$video = $container->articles->insert(['label' => $slug, 'text' => 'text']);
Assert::equal($video->getSlugs(), []);

$video->addSlug($slug);
Assert::equal($video->getSlugs(), [$slug]);
Assert::equal($video->getSlug(), $slug);

$video->addSlug($slug2);
Assert::equal($video->getSlugs(), [$slug2, $slug]);
Assert::equal($video->getSlug(), $slug2);
