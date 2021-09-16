<?php

namespace Leuverink\Collections\Concerns;

trait Reduce
{
    /**
     * Reduce the collection to a single value.
     */
    public function reduce(callable $callback, $initial = null): mixed
    {
        $result = $initial;

        foreach ($this->items as $key => $value) {
            $result = $callback($result, $value, $key);
        }

        return $result;
    }
}
