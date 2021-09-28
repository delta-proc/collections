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

    public function whenEmpty($callback)
    {
        return $this->when(empty($this->items), $callback);
    }

    public function whenNotEmpty($callback)
    {
        return $this->when(!empty($this->items), $callback);
    }

    public function unlessEmpty($callback)
    {
        return $this->whenNotEmpty($callback);
    }

    public function unlessNotEmpty($callback)
    {
        return $this->whenEmpty($callback);
    }
}
