<?php

declare(strict_types=1);

use Sloth\LazyIterator;

require __DIR__ . '/bootstrap.php';

$iterator = new LazyIterator(fn () => [1 => 'a', 3 => 'b']);

Assert::true($iterator->getIterator() instanceof Iterator);
Assert::equal(2, count($iterator));
