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

it('exposes value and a loop index arguments', function () {
    $items = ['foo', 'bar', 'baz'];

    Collection::make($items)->map(function ($item, $index) use ($items) {
        expect($items[$index])->toBe($item);
    });
});
