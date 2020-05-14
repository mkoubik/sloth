Sloth
=====
![CI](https://github.com/mkoubik/sloth/workflows/CI/badge.svg)
[![codecov](https://codecov.io/gh/mkoubik/Sloth/branch/master/graph/badge.svg)](https://codecov.io/gh/mkoubik/Sloth)

Installation
------------
`composer require mkoubik/sloth`

Usage
-----
```php
<?php

require __DIR__ . '/vendor/autoload.php';


// LazyString:

$string = new Sloth\LazyString(function() {
	return 'Hello world!';
});

echo $string; // callback is called at this point
echo $string; // callback is not called any more


// LazyIterator:

$iterator = new Sloth\LazyIterator(function() {
	return range(1, 9999);
});

foreach ($iterator as $number) { // callback is called at this point
	echo $number . "\n";
}

echo count($iterator); // works too


// LazyAccessor:

$person = new Sloth\LazyAccessor(function() {
	return new Person('John Doe');
});

echo $person->name; // callback is called at this point

if (isset($person->name)) {
	unset($person->name);
}

echo $person->setName('John Doe');
```
