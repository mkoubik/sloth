<?php

require __DIR__ . '/bootstrap.php';

class Greeter
{
    public function sayHello($name)
    {
        return "Hello $name!";
    }
}

$countCalled = 0;
$callback = function() use (&$countCalled) {
    $countCalled++;
    return new Greeter();
};
$greeter = new Sloth\LazyAccessor($callback);

Assert::equal('Hello world!', $greeter->sayHello('world'));
Assert::equal('Hello John!', $greeter->sayHello('John'));

Assert::equal(1, $countCalled);
