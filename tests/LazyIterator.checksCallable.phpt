<?php

require __DIR__ . '/bootstrap.php';

Assert::throws(function () {
    new Sloth\LazyIterator('not callable');
}, TypeError::class);
