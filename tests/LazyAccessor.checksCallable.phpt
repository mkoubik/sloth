<?php

require __DIR__ . '/bootstrap.php';

Assert::exception(function () {
    new Sloth\LazyAccessor('not callable');
}, 'Sloth\InvalidArgumentException');