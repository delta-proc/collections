<?php

use Leuverink\Collections\Collection;

it('invokes callback for every item', function () {
    $count = 0;

    Collection::make([1, 2, 3])->each(function ($item) use (&$count) {
        $count++;
    });

    expect($count)->toBe(3);
});


it('breaks out of iteration when callback returns false', function () {
    $count = 0;

    Collection::make([1, 2, 3])->each(function ($item) use (&$count) {
        if ($item === 3) {
            return false;
        }

        $count++;
    });

    expect($count)->toBe(2);
});


it('exposes value and a index arguments', function () {
    $items = ['foo', 'bar', 'baz'];

    Collection::make($items)->each(function ($item, $index) use ($items) {
        expect($items[$index])->toBe($item);
    });
});
