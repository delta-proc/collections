<?php

namespace Leuverink\Collections\Concerns;

trait Map
{
    public function map(callable $callback): self
    {
        foreach ($this->items as $key => $value) {
            $this->items[$key] = $callback($value, $key);
        }

        return $this;
    }
}
