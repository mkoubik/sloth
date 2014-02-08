<?php

require __DIR__ . '/bootstrap.php';

class Person
{
    public $name = 'John Doe';
}

$countCalled = 0;
$callback = function() use (&$countCalled) {
    $countCalled++;
    return new Person();
};
$person = new Sloth\LazyAccessor($callback);

Assert::equal('John Doe', $person->name);
Assert::equal('John Doe', $person->name);

Assert::equal(1, $countCalled);
