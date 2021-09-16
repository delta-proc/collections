<?php

namespace Leuverink\Collections\Concerns;

trait Reduce
{
    /**
     * Reduce the collection to a single value.
     */
    public function reduce(callable $callback, $carry = null): mixed
    {
        foreach ($this as $key => $value) {
            $carry = $callback($carry, $value, $key);
        }

        return $carry;
    }
}
