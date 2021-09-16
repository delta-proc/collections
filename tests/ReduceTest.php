<?php

use Leuverink\Collections\Collection;

it('reduces to a single value')
    ->expect(
        Collection::make([1, 2, 3])->reduce(fn ($carry, $item) => $carry + $item)
    )
    ->toBe(6);


it('passes null as a initial carry value')
    ->expect(
        Collection::make([1])->reduce(fn ($carry, $item) => $carry)
    )
    ->toBeNull();


it('accepts a optional second argument for a default carry value')
    ->expect(
        Collection::make([1])->reduce(fn ($carry, $item) => $carry, 'foo')
    )
    ->toBe('foo');


it('applies default carry value')
    ->expect(
        Collection::make([1, 2, 3])->reduce(fn ($carry, $item) => $carry + $item, 10)
    )
    ->toBe(16);


it('exposes carry value and index arguments', function () {
    $items = ['foo', 'bar', 'baz'];

    Collection::make($items)
        ->reduce(function ($carry, $item, $index) use ($items) {
            expect($items[$index])->toBe($item)->and($carry)->toBe('foo');

            return $carry;
        }, 'foo');
});
