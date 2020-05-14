<?php

declare(strict_types=1);

use Sloth\LazyAccessor;
use SlothTests\Mocks\CountingCallback;
use SlothTests\Mocks\Person;

require __DIR__ . '/bootstrap.php';

$callback = new CountingCallback(fn () => new Person('John Doe'));
$person = new LazyAccessor($callback);

Assert::equal('John Doe', $person->name);
Assert::equal('John Doe', $person->name);

Assert::equal(1, $callback->counter);
