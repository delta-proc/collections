<?php

use Leuverink\Collections\Collection;

it('returns the last item')
    ->expect(Collection::make([3, 2, 1])->last())
    ->toBe(1);

it('returns null if the collection is empty')
    ->expect(Collection::make()->last())
    ->toBeNull();

it('returns the last element passing the given truth test')
    ->expect(
        Collection::make([1, 2, 3])->last(fn ($value) => $value < 3)
    )->toBe(2);

it('returns the given default value if no match was found')
    ->expect(
        Collection::make([1, 2, 3])->last(fn ($value) => $value > 4, 'foo')
    )->toBe('foo');

it('exposes value and a index arguments', function () {
    $items = ['foo', 'bar', 'baz'];

    Collection::make($items)->last(function ($item, $index) use ($items) {
        expect(array_reverse($items)[$index])->toBe($item);
    });
});
