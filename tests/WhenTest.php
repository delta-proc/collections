<?php

use Leuverink\Collections\Collection;

// When
it('executes callback when expression is true', function () {
    $collection = Collection::make('foo')->when(true, function ($items) {
        $items[] = 'bar';
    });

    expect($collection)
        ->toHaveCount(2)
        ->sequence(
            fn ($value) => $value->toBe('foo'),
            fn ($value) => $value->toBe('bar')
        );
});


it('does not execute callback when expression is true', function () {
    $collection = Collection::make('foo')->when(false, function ($items) {
        $items[] = 'bar';
    });

    expect($collection)->toHaveCount(1);
});

// whenEmpty
it('executes callback when argument is empty', function () {
    //
});

it('does not execute callback when argument is not empty');

// whenNotEmpty
it('executes callback when argument is not empty');
it('does not execute callback when argument is empty');
