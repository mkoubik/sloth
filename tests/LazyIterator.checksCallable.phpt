<?php

declare(strict_types=1);

use Sloth\LazyIterator;

require __DIR__ . '/bootstrap.php';

Assert::throws(
    fn () => new LazyIterator('not callable'),
    TypeError::class,
);
