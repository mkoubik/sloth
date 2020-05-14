<?php

require __DIR__ . '/bootstrap.php';

$countCalled = 0;
$callback = function () use (&$countCalled) {
    $countCalled++;
    return new ArrayIterator([]);
};
$iterator = new Sloth\LazyIterator($callback);

foreach ($iterator as $item) {
}
foreach ($iterator as $item) {
}

Assert::equal(1, $countCalled);
