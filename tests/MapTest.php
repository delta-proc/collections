<?php

use Leuverink\Collections\Collection;

it('maps into a new datastructure')
    ->expect(
        fn () => Collection::make([1, 2, 3])->map(fn ($number) => $number * 2)
    )
    ->sequence(
        fn ($number) => $number->toBe(2),
        fn ($number) => $number->toBe(4),
        fn ($number) => $number->toBe(6)
    );
