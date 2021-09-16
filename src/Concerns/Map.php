<?php

namespace Leuverink\Collections\Concerns;

trait Map
{
    /**
     * Map a collection using a callback.
     */
    public function map(callable $callback): self
    {
        // Could make use of array_map() or internal each() here
        // but this is more readable and reduces the call stack
        foreach ($this as $key => $value) {
            $this[$key] = $callback($value, $key);
        }

        return $this;
    }
}
