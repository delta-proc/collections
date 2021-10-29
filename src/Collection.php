<?php

namespace Leuverink\Collections;

use Countable;
use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;

class Collection implements Countable, ArrayAccess, IteratorAggregate
{
    use Concerns\Map;
    use Concerns\Sum;
    use Concerns\Each;
    // use Concerns\Last;
    use Concerns\First;
    use Concerns\Reduce;
    use Concerns\Conditionals;

    final public function __construct(protected array $items = [])
    {
    }

    public static function make($items = [])
    {
        return new static(
            is_array($items) ? $items : [$items]
        );
    }

    public function count()
    {
        return count($this->items);
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            return $this->items[] = $value;
        }

        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
