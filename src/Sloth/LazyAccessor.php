<?php

namespace Sloth;

class LazyAccessor
{
    /** @var callable */
    private $callback;

    private $object;

    public function __construct($callback)
    {
        if (!is_callable($callback)) {
            throw new InvalidArgumentException();
        }
        $this->callback = $callback;
    }

    public function __get($name)
    {
        $this->initialize();
        return $this->object->$name;
    }

    public function __set($name, $value)
    {
        $this->initialize();
        return $this->object->$name = $value;
    }

    public function __isset($name)
    {
        $this->initialize();
        return isset($this->object->$name);
    }

    public function __unset($name)
    {
        $this->initialize();
        unset($this->object->$name);
    }

    public function __call($name, array $arguments)
    {
        $this->initialize();
        return call_user_func_array(array($this->object, $name), $arguments);
    }

    private function initialize()
    {
        if ($this->object === null) {
            $this->object = call_user_func($this->callback);
        }
    }
}
