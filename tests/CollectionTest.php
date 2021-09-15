<?php

use Leuverink\Collections\Collection;

it('initalizes as an empty collection when no arguments are passed')
    ->expect(fn () => Collection::make())
    ->toHaveCount(0);

it('wraps a single argument in an array if it is not already an array')
    ->expect(fn () => Collection::make('foo'))
    ->toHaveCount(1);

it('wraps an array of items')
    ->expect(fn () => Collection::make(['foo', 'bar', 'baz']))
    ->toHaveCount(3);

it('acts as an array')
    ->expect(fn () => Collection::make('foo')[0])
    ->toBe('foo');

it('is iterable')
    ->expect(fn () => Collection::make(['foo', 'bar', 'baz']))
    ->sequence(
        fn ($number) => $number->toBe('foo'),
        fn ($number) => $number->toBe('bar'),
        fn ($number) => $number->toBe('baz')
    );
