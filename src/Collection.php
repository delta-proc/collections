<?php

namespace Leuverink\Collections;

use Countable;

class Collection implements Countable
{
    public function __construct(protected array $items = []) { }

    public static function make($items = [])
    {
        $items = is_array($items) ? $items : [$items];
        return new static($items);
    }

    public function count() {
        return count($this->items);
    }
}
