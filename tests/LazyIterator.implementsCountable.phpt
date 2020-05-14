<?php

declare(strict_types=1);

use Sloth\LazyIterator;

require __DIR__ . '/bootstrap.php';

$iterator = new LazyIterator(fn () => new ArrayIterator(['a', 'b', 'c']));

Assert::equal(3, count($iterator));
