<?php

use Leuverink\Collections\Collection;

it('counts the number of items in flat collection')
    ->expect(Collection::make([1, 2, 3])->count())
    ->toBe(3);

it('counts the number of items in multi dimentional collection')
    ->expect(Collection::make(['foo' => 1, 'bar' => 2, 'baz' => 3])->count())
    ->toBe(3);
