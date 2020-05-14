<?php

use Sloth\LazyAccessor;
use SlothTests\Mocks\CountingCallback;
use SlothTests\Mocks\Greeter;

require __DIR__ . '/bootstrap.php';

$callback = new CountingCallback(fn () => new Greeter());
$greeter = new LazyAccessor($callback);

Assert::equal('Hello world!', $greeter->sayHello('world'));
Assert::equal('Hello John!', $greeter->sayHello('John'));

Assert::throws(
    fn () => $greeter->nonExistingMethod(),
    TypeError::class,
);

Assert::equal(1, $callback->counter);
