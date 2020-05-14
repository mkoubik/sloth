<?php

require __DIR__ . '/bootstrap.php';

$callback = function () {
    return new ArrayIterator([1, 2, 3]);
};
$iterator = new Sloth\LazyIterator($callback);

$values = [];
foreach ($iterator as $value) {
    $values[] = $value;
}

Assert::equal(3, count($values));
Assert::equal(1, $values[0]);
Assert::equal(2, $values[1]);
Assert::equal(3, $values[2]);


$callback = function () {
    return new ArrayIterator([]);
};
$iterator = new Sloth\LazyIterator($callback);
$values = iterator_to_array($iterator);

Assert::true(empty($values));
Assert::equal(0, count($iterator));
