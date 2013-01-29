<?php

/**
 * DBAL: CRUD
 */

use Tester\Assert;
require __DIR__ . '/../bootstrap.php';


$count = countRows($container);

$name = 'Test Name';
$name2 = 'Second Name';

$author = $container->authors->insert(['name' => $name, 'role' => 'dubbing']);
Assert::equal($author instanceof Author, TRUE);
Assert::equal($count + 1, countRows($container));

$author = $container->authors->find($author->id);
Assert::equal($author instanceof Author, TRUE);

Assert::equal($author->name, $name);
$author->name = $name2;
$author->update();

$author = $container->authors->find($author->id);
Assert::equal($author instanceof Author, TRUE);
Assert::equal($author->name, $name2);

$author->delete();
Assert::equal($count, countRows($container));


function countRows($c)
{
	return $c->authors->findAll()->count();
}
