<?php

namespace Leuverink\Collections\Concerns;

trait Conditionals
{
    public function when($expression, $callback)
    {
        if ($expression) {
            $callback($this, $expression);
        }

        return $this;
    }

    public function unless($expression, $callback)
    {
        return $this->when(!$expression, $callback);
    }
}
