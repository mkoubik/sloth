<?php

require __DIR__ . '/bootstrap.php';

$countCalled = 0;
$object = new StdClass();
$object->name = 'John Doe';
$callback = function() use (&$countCalled, $object) {
    $countCalled++;
    return $object;
};
$person = new Sloth\LazyAccessor($callback);

Assert::true(isset($person->name));
unset($person->name);
Assert::false(isset($person->name));

Assert::equal(1, $countCalled);
