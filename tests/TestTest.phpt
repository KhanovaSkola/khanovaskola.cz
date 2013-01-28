<?php

use Tester\Assert;
require __DIR__ . '/bootstrap.php';

Assert::equal(1, 1);
Assert::equal($container->users->findAll()->count(), 0);
