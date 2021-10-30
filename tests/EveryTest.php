<?php

use Leuverink\Collections\Collection;

it('returns true if every item passes truth test')
    ->expect(
        Collection::make([3, 4, 5])->every(fn ($value, $key) => $value > 2)
    )
    ->toBe(true);

it('returns false if an item doesn\'t pass truth test')
    ->expect(
        Collection::make([3, 4, 5])->every(fn ($value, $key) => $value > 3)
    )
    ->toBe(false);
