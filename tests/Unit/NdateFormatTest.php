<?php

test('AD date convert to BS Date with format', function () {
    $ad = '2023-11-08';
    $bs = '22/07/2080';

    $date = \Kmlpandey77\Ndate\Ndate::to_bs($ad)->format('d/m/Y');

    expect("$date")->toBe($bs);
});

test('Convert only AD year to BS', function () {
    $ad = '2023-11-08';
    $bs = '2080';

    $date = \Kmlpandey77\Ndate\Ndate::to_bs($ad)->format('Y');

    expect("$date")->toBe($bs);
});

test('Date format with month name', function () {
    $ad = '2023-11-08';
    $bs = 'Kartik 22, 2080';

    $date = \Kmlpandey77\Ndate\Ndate::to_bs($ad)->format('M d, Y');

    expect("$date")->toBe($bs);
});
