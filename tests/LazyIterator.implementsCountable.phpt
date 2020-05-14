<?php

require __DIR__ . '/bootstrap.php';

$iterator = new Sloth\LazyIterator(function () {
    return new ArrayIterator(['a', 'b', 'c']);
});

Assert::equal(3, count($iterator));
