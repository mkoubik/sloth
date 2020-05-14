<?php

require __DIR__ . '/bootstrap.php';

Assert::throws(function () {
    new Sloth\LazyAccessor('not callable');
}, TypeError::class);
