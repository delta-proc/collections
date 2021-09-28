<?php

use Leuverink\Collections\Collection;

// Unless
it('executes callback unless expression is false')
->expect(Collection::make('foo')->unless(false, fn ($items) => $items[] = 'bar'))
    ->toHaveCount(2)
    ->sequence(
        fn ($value) => $value->toBe('foo'),
        fn ($value) => $value->toBe('bar')
    );

it('does not execute callback unless expression is true')
    ->expect(Collection::make('foo')->unless(true, fn ($items) => $items[] = 'bar'))
    ->toHaveCount(1);

// unlessEmpty
it('executes callback unless collection is empty')
    ->expect(Collection::make('foo')->unlessEmpty(fn ($items) => $items[] = 'bar'))
    ->toHaveCount(2);

it('does not execute callback unless collection is not empty')
    ->expect(Collection::make()->unlessEmpty(fn ($items) => $items[] = 'bar'))
    ->toBeEmpty();

// unlessNotEmpty
it('executes callback unless collection is not empty')
    ->expect(Collection::make()->unlessNotEmpty(fn ($items) => $items[] = 'bar'))
    ->toHaveCount(1);

it('does not execute callback unless collection is empty')
    ->expect(Collection::make('foo')->unlessNotEmpty(fn ($items) => $items[] = 'bar'))
    ->toHaveCount(1);
