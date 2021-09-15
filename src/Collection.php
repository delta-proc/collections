<?php

namespace Leuverink\Collections;

use ArrayAccess;
use Countable;

class Collection implements Countable, ArrayAccess
{
    public function __construct(protected array $items = []) { }

    public static function make($items = [])
    {
        return new static(
            is_array($items) ? $items : [$items]
        );
    }

    public function count() {
        return count($this->items);
    }

    public function offsetExists($offset) {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset) {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value) {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset) {
        unset($this->items[$offset]);
    }
}
