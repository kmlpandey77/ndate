<?php

use Kmlpandey77\Ndate\Ndate;

test('AD date convert to BS Date with format', function () {
    $ad = '2023-11-08';
    $bs = '22/07/2080';
    $date_to_bs = Ndate::to_bs($ad, 'd/m/Y');
    $date_to_bs_1 = Ndate::to_bs($ad)->format('d/m/Y');

    expect("$date_to_bs")->toBe($bs);
    expect("$date_to_bs_1")->toBe($bs);
});

test('Date format with month name', function () {
    $ad = '2023-11-08';
    $bs = 'Kartik 22, 2080';

    $date_to_bs = Ndate::to_bs($ad, 'M d, Y');
    $date_to_bs_1 = Ndate::to_bs($ad)->format('M d, Y');

    expect("$date_to_bs")->toBe($bs);
    expect("$date_to_bs_1")->toBe($bs);
});
