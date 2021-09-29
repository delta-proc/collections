<?php

namespace Leuverink\Collections\Concerns;

trait Last
{
    /**
     * Get the first item in this collection, or return null.
     * If passed a closure, it will return the first
     * item passing the given thruth check
     */
    public function last(callable $callback = null, $default = null): mixed
    {
        if (! $callback) {
            return empty($this->items) ? $default : $this[count($this->items) - 1];
        }

        foreach (array_reverse($this->items) as $key => $item) {
            if ($callback($item, $key)) {
                return $item;
            }
        }

        return $default;
    }
}
