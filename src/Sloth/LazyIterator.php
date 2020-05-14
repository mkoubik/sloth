<?php

declare(strict_types=1);

namespace Sloth;

/**
 * @template TKey
 * @template TValue
 * @implements \IteratorAggregate<TKey, TValue>
 */
final class LazyIterator implements \IteratorAggregate, \Countable
{
    /** @var callable(): iterable<TKey, TValue> */
    private $callback;

    /** @var ?iterable<TKey, TValue> */
    private ?iterable $iterator = null;

    /**
     * @param callable(): iterable<TKey, TValue> $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return iterable<TKey, TValue>
     */
    public function getIterator(): iterable
    {
        if ($this->iterator !== null) {
            return $this->iterator;
        }

        $iterator = call_user_func($this->callback);

        if (is_array($iterator)) {
            $this->iterator = new \ArrayIterator($iterator);
            return $this->iterator;
        }

        return $this->iterator = $iterator;
    }

    public function count(): int
    {
        return iterator_count($this);
    }
}
