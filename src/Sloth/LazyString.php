<?php

namespace Sloth;

class LazyString
{
    /** @var callable */
    private $callback;

    /** @var string */
    private $string;

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

    public function __toString()
    {
        if ($this->string !== null) {
            return $this->string;
        }
        $this->string = call_user_func($this->callback);
        return $this->string;
    }
}
