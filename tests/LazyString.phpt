<?php

declare(strict_types=1);

use Sloth\LazyString;
use SlothTests\Mocks\CountingCallback;

require __DIR__ . '/bootstrap.php';

$callback = new CountingCallback(fn () => 'Hello world!');
$string = new LazyString($callback);

Assert::equal('Hello world!', (string) $string);
Assert::equal('Hello world!', (string) $string);

Assert::equal(1, $callback->counter);
