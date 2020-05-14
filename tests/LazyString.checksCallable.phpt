<?php

require __DIR__ . '/bootstrap.php';

Assert::throws(function () {
    new Sloth\LazyString('not callable');
}, TypeError::class);
