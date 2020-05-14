<?php

declare(strict_types=1);

namespace Sloth;

/**
 * @template T
 */
final class LazyAccessor
{
    /** @var callable(): object */
    private $callback;

    private ?object $object = null;

    /**
     * @param callable(): object $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->getObject()->$name;
    }

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value): void
    {
        $this->getObject()->$name = $value;
    }

    public function __isset(string $name): bool
    {
        return isset($this->getObject()->$name);
    }

    public function __unset(string $name): void
    {
        unset($this->getObject()->$name);
    }

    /**
     * @param mixed[] $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $callable = [$this->getObject(), $name];

        if (!is_callable($callable)) {
            throw new \TypeError(sprintf('class \'%s\' does not have method \'%s\'', static::class, $name));
        }

        return call_user_func_array($callable, $arguments);
    }

    private function getObject(): object
    {
        if ($this->object === null) {
            $this->object = call_user_func($this->callback);
        }

        return $this->object;
    }
}
