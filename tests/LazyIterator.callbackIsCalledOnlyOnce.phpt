<?php

declare(strict_types=1);

use Sloth\LazyIterator;
use SlothTests\Mocks\CountingCallback;

require __DIR__ . '/bootstrap.php';

$callback = new CountingCallback(fn () => new ArrayIterator([]));
$iterator = new LazyIterator($callback);

foreach ($iterator as $item) {
}
foreach ($iterator as $item) {
}

Assert::equal(1, $callback->counter);
