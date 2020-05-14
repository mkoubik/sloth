<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

Assert::throws(
    fn () => new Sloth\LazyString('not callable'),
    TypeError::class,
);
