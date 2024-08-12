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

test('Invalid Date', function () {
    $ad = '2043-11-08';

    expect(fn () => Ndate::to_bs($ad))
        ->toThrow(InvalidDateException::class);
});


test('Asar 2081 date issue', function () {
    $ad = '2024-07-03';
    $bs = '2081-03-19';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('July 1937 date issue', function () {
    $ad = '1937-07-12';
    $bs = '1994-03-29';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('test date1', function () {

    $ad = '1983-01-02';
    $bs = '2039-09-18';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('test date 2', function () {

    $ad = '2019-07-23';
    $bs = '2076-04-07';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('test date 3', function () {

    $ad = '1950-07-24';
    $bs = '2007-04-09';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('test date 4', function () {

    $ad = '1991-02-03';
    $bs = '2047-10-20';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('test date 5', function () {

    $ad = '1987-11-08';
    $bs = '2044-07-22';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('test date 6', function () {

    $ad = '1988-08-09';
    $bs = '2045-04-25';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('leap year date', function () {

    $ad = '1996-02-29';
    $bs = '2052-11-17';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('leap year2 date', function () {

    $ad = '1994-04-08';
    $bs = '2050-12-26';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('future date', function () {

    $ad = '2025-12-31';
    $bs = '2082-09-16';

    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});
