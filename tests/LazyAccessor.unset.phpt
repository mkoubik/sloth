<?php

declare(strict_types=1);

use Sloth\LazyAccessor;
use SlothTests\Mocks\CountingCallback;

require __DIR__ . '/bootstrap.php';

$object = new StdClass();
$object->name = 'John Doe';
$callback = new CountingCallback(fn () => $object);
$person = new LazyAccessor($callback);

Assert::true(isset($person->name));
unset($person->name);
Assert::false(isset($person->name));

Assert::equal(1, $callback->counter);
