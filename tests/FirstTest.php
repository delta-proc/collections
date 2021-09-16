<?php

use Leuverink\Collections\Collection;

it('returns the first item')
    ->expect(Collection::make([3, 2, 1])->first())
    ->toBe(3);

it('returns null if the collection is empty')
    ->expect(Collection::make()->first())
    ->toBeNull();

it('returns the first element passing the given truth test')
    ->expect(
        Collection::make([1, 2, 3])->first(fn ($value) => $value > 1)
    )->toBe(2);

it('returns the given default value if no match was found')
    ->expect(
        Collection::make([1, 2, 3])->first(fn ($value) => $value > 4, 'foo')
    )->toBe('foo');

it('exposes value and a index arguments', function () {
    $items = ['foo', 'bar', 'baz'];

    Collection::make($items)->first(function ($item, $index) use ($items) {
        expect($items[$index])->toBe($item);
    });
});
