<?php

declare(strict_types=1);

use Sloth\LazyAccessor;

require __DIR__ . '/bootstrap.php';

Assert::throws(
    fn () => new LazyAccessor('not callable'),
    TypeError::class,
);
