<?php

use SlothTests\Mocks\Person;

require __DIR__ . '/bootstrap.php';

$countCalled = 0;
$callback = function () use (&$countCalled) {
    $countCalled++;
    return new Person('John Doe');
};
$person = new Sloth\LazyAccessor($callback);

Assert::equal('John Doe', $person->name);
Assert::equal('John Doe', $person->name);

Assert::equal(1, $countCalled);
