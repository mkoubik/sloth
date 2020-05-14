<?php

declare(strict_types=1);

namespace SlothTests\Mocks;

class CountingCallback
{
    public int $counter = 0;

    /** @var callable */
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $this->counter++;

        return call_user_func_array($this->callback, func_get_args());
    }
}
