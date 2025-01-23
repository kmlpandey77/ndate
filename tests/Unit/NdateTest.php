<?php

use Kmlpandey77\Ndate\Exceptions\InvalidDateException;
use Kmlpandey77\Ndate\Ndate;

test('AD date convert to BS Date', function () {
    $ad = '2023-11-08';
    $bs = '2080-07-22';
    $bs_np = '२०८०-०७-२२';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs)
        ->and("{$date_to_bs->lang(Ndate::NP)}")->toBe($bs_np);
});

test('BS date convert to AD Date', function () {
    $ad = '2023-11-08';
    $bs = '2080-07-22';

    $date_to_ad = Ndate::to_ad($bs);

    expect("{$date_to_ad}")->toBe($ad);
});

test('Invalid Date', function () {
    $ad = '2043-11-08';
    $bs = '2101-11-08';

    expect(fn () => Ndate::to_bs($ad))->toThrow(InvalidDateException::class)
        ->and(fn () => Ndate::to_ad($bs))->toThrow(InvalidDateException::class);
});

test('Asar 2081 date issue', function () {
    $ad = '2024-07-03';
    $bs = '2081-03-19';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('July 1937 date issue', function () {
    $ad = '1937-07-12';
    $bs = '1994-03-29';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date One', function () {
    $ad = '1983-01-02';
    $bs = '2039-09-18';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date Two', function () {
    $ad = '2019-07-23';
    $bs = '2076-04-07';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date Three', function () {
    $ad = '1950-07-24';
    $bs = '2007-04-09';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date Four', function () {
    $ad = '1991-02-03';
    $bs = '2047-10-20';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date Five', function () {
    $ad = '1987-11-08';
    $bs = '2044-07-22';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date Six', function () {
    $ad = '1988-08-09';
    $bs = '2045-04-25';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Date Se7en', function () {
    $ad = '1935-11-17';
    $bs = '1992-08-02';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Leap year date', function () {
    $ad = '1996-02-29';
    $bs = '2052-11-17';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Leap year date 2', function () {
    $ad = '1994-04-08';
    $bs = '2050-12-26';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});

test('Future date', function () {
    $ad = '2025-12-31';
    $bs = '2082-09-16';

    $to_bs = Ndate::to_bs($ad);
    $to_ad = Ndate::to_ad($bs);

    expect("{$to_bs}")->toBe($bs)
        ->and("{$to_ad}")->toBe($ad);
});
