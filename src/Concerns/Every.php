<?php

namespace Leuverink\Collections\Concerns;

trait Every
{
    /**
     * Check if every item in the collection passes the given truth test.
     */
    public function every(callable $callback): bool
    {
        foreach ($this as $key => $value) {
            if (! $callback($value, $key)) {
                return false;
            }
        }

        return true;
    }
}
