<?php

require __DIR__ . '/bootstrap.php';

Assert::exception(function() {
	new Sloth\LazyIterator('not callable');
}, 'Sloth\InvalidArgumentException');
