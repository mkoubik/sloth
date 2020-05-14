<?php

declare(strict_types=1);

namespace SlothTests\Mocks;

class Greeter
{
    public function sayHello(string $name): string
    {
        return "Hello $name!";
    }
}
