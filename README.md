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

use Sloth\LazyString;

$string = new LazyString(fn () => 'Hello world!');

echo $string; // callback is called at this point
echo $string; // callback is not called any more
```

```php
<?php

use Sloth\LazyIterator;

$iterator = new LazyIterator(fn () => range(1, 9999));

foreach ($iterator as $number) { // callback is called at this point
    echo $number . "\n";
}

echo count($iterator); // works too
```

```php
<?php

use Sloth\LazyAccessor;

$person = new LazyAccessor(fn () => new Person('John Doe'));

echo $person->name; // callback is called at this point

if (isset($person->name)) {
    unset($person->name);
}

echo $person->setName('John Doe');
```
