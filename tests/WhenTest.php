<?php

use Leuverink\Collections\Collection;

// When
it('executes callback when expression is true')
    ->expect(Collection::make('foo')->when(true, fn ($items) => $items[] = 'bar'))
    ->toHaveCount(2)
    ->sequence(
        fn ($value) => $value->toBe('foo'),
        fn ($value) => $value->toBe('bar')
    );

it('does not execute callback when expression is true')
    ->expect(Collection::make('foo')->when(false, fn ($items) => $items[] = 'bar'))
    ->toHaveCount(1);

// whenEmpty
it('executes callback when collection is empty')
    ->expect(Collection::make()->whenEmpty(fn ($items) => $items[] = 'bar'))
    ->toHaveCount(1);

it('does not execute callback when collection is not empty')
    ->expect(Collection::make('foo')->whenEmpty(fn ($items) => $items[] = 'bar'))
    ->toHaveCount(1);

// whenNotEmpty
it('executes callback when argument is not empty')
    ->expect(Collection::make('foo')->whenNotEmpty(fn ($items) => $items[] = 'bar'))
    ->toHaveCount(2);

it('does not execute callback when argument is empty')
    ->expect(Collection::make()->whenNotEmpty(fn ($items) => $items[] = 'bar'))
    ->toBeEmpty();
