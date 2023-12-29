<?php

use Kmlpandey77\Ndate\Exceptions\InvalidDateException;
use Kmlpandey77\Ndate\Ndate;

test('AD date convert to BS Date', function () {
    $ad = '2023-11-08';
    $bs = '2080-07-22';
    $date_to_bs = Ndate::to_bs($ad);

    expect("{$date_to_bs}")->toBe($bs);
});

test('Invalid Date', function () {
    $ad = '2043-11-08';

    expect(fn() => Ndate::to_bs($ad))
        ->toThrow(InvalidDateException::class);

});

test('AD date convert to BS Date in Nepali lang', function () {
    $ad = '2023-11-08';
    $bs = '२०८०-०७-२२';

    $date_to_bs = Ndate::to_bs($ad, lang: 'np');
    expect("$date_to_bs")->toBe($bs);
});
