<?php

use Leuverink\Collections\Collection;

it('maps into a new datastructure')
    ->expect(
        Collection::make([1, 2, 3])->map(fn ($number, $key) => $number * $key)
    )
    ->sequence(
        fn ($number) => $number->toBe(0),
        fn ($number) => $number->toBe(2),
        fn ($number) => $number->toBe(6)
    );
