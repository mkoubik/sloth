<?php

namespace SlothTests\Mocks;

class Person
{
    /** @var string */
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
