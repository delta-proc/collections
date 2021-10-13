<?php

use Leuverink\Collections\Collection;

it('sums a single dimensional array')
    ->expect(Collection::make([1, 2, 3])->sum())
    ->toBe(6);

it('sums properties of multi dimensional arrays', function () {
    $collection = Collection::make([
        ['foo' => 2, 'bar' => 4],
        ['foo' => 1, 'bar' => 4],
        ['foo' => 2, 'bar' => 4],
    ]);

    $this->expect($collection->sum('foo'))->toBe(5);
});

it('sums properties of an array of objects');
