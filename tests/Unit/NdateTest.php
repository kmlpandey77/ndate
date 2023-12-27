<?php

test('AD date convert to BS Date', function () {
    $ad = '2023-11-08';
    $bs = '2080-07-22';

    $date = \Kmlpandey77\Ndate\Ndate::to_bs($ad);

    expect("$date")->toBe($bs);
});
