<?php

require __DIR__ . '/bootstrap.php';

Assert::exception(function() {
	new Sloth\LazyString('not callable');
}, 'Sloth\InvalidArgumentException');
