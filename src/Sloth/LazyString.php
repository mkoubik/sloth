<?php

declare(strict_types=1);

namespace Sloth;

final class LazyString
{
    /** @var callable(): string */
    private $callback;

    /** @var ?string */
    private $string;

    /**
     * @param callable(): string $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function __toString(): string
    {
        if ($this->string !== null) {
            return $this->string;
        }

        $this->string = call_user_func($this->callback);

        return $this->string;
    }
}
