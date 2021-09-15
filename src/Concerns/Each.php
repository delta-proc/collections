<?php

namespace Leuverink\Collections\Concerns;

trait Each
{
    /**
     * Invoke callback for each item in the collection
     */
    public function each(callable $callback): self
    {
        foreach ($this as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }
}
