<?php

namespace Sloth;

class LazyIterator implements \IteratorAggregate, \Countable
{
    /** @var callable */
    private $callback;

    /** @var \Iterator */
    private $iterator;

    /**
     * @param $callback that returns \Traversable, \Iterator or array
     */
    public function __construct($callback)
    {
        if (!is_callable($callback)) {
            throw new InvalidArgumentException();
        }
        $this->callback = $callback;
    }

    /**
     * @return \Traversable iterator
     */
    public function getIterator()
    {
        if ($this->iterator !== null) {
            return $this->iterator;
        }
        $iterator = call_user_func($this->callback);
        if (is_array($iterator)) {
            $this->iterator = new \ArrayIterator($iterator);
            return $this->iterator;
        }
        $this->iterator = $iterator;
        return $this->iterator;
    }

    public function count()
    {
        return iterator_count($this);
    }
}
