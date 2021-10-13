<?php

namespace Leuverink\Collections\Concerns;

trait Sum
{
    /**
     * Sums the values of the collection.
     */
    public function sum($callback = null): mixed
    {
        $callback = is_callable($callback)
            ? $callback
            : function ($value) {
                return $value;
            };

        return $this->reduce(function ($result, $item) use ($callback) {
            return $result + $callback($item);
        }, 0);
    }
}
