<?php

declare(strict_types=1);

use Sloth\LazyAccessor;
use SlothTests\Mocks\CountingCallback;
use SlothTests\Mocks\Person;

require __DIR__ . '/bootstrap.php';

$object = new Person('');
$callback = new CountingCallback(fn () => $object);
$person = new LazyAccessor($callback);

$person->name = 'John Doe';
Assert::equal('John Doe', $object->name);

$person->name = 'John Doe !!!';
Assert::equal('John Doe !!!', $object->name);

Assert::equal(1, $callback->counter);
