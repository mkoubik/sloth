<?php

declare(strict_types=1);

use Sloth\LazyIterator;

require __DIR__ . '/bootstrap.php';

$emptyIterator = new LazyIterator(fn () => new ArrayIterator([1, 2, 3]));

$values = [];
foreach ($emptyIterator as $value) {
    $values[] = $value;
}

Assert::equal(3, count($values));
Assert::equal(1, $values[0]);
Assert::equal(2, $values[1]);
Assert::equal(3, $values[2]);


$emptyIterator = new LazyIterator(fn () => new ArrayIterator([]));
$values = iterator_to_array($emptyIterator);

Assert::true(empty($values));
Assert::equal(0, count($emptyIterator));
