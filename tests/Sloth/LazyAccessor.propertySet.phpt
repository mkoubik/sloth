<?php

require __DIR__ . '/bootstrap.php';

class Person
{
    public $name = '';
}

$countCalled = 0;
$object = new Person();
$callback = function() use (&$countCalled, $object) {
    $countCalled++;
    return $object;
};
$person = new Sloth\LazyAccessor($callback);

$person->name = 'John Doe';
Assert::equal('John Doe', $object->name);

$person->name = 'John Doe !!!';
Assert::equal('John Doe !!!', $object->name);

Assert::equal(1, $countCalled);
