<?php

require __DIR__ . '/bootstrap.php';

$countCalled = 0;
$callback = function () use (&$countCalled) {
    $countCalled++;
    return 'Hello world!';
};
$string = new Sloth\LazyString($callback);

Assert::equal('Hello world!', (string) $string);
Assert::equal('Hello world!', (string) $string);

Assert::equal(1, $countCalled);
