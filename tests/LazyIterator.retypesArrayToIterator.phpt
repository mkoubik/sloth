<?php

require __DIR__ . '/bootstrap.php';

$iterator = new Sloth\LazyIterator(function () {
    return [1 => 'a', 3 => 'b'];
});

Assert::true($iterator->getIterator() instanceof Iterator);
Assert::equal(2, count($iterator));
