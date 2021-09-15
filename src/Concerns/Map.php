<?php

namespace Leuverink\Collections\Concerns;

trait Map
{
    public function map(callable $closure): self
    {
        foreach ($this->items as $key => $value) {
            $this->items[$key] = $closure($value, $key);
        }

        return $this;
    }
}
