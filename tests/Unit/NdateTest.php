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
