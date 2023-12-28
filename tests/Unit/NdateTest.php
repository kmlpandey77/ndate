<?php

//test('AD date convert to BS Date', function () {
//    $ad = '2023-11-08';
//    $bs = '2080-07-22';
//
//    $date = new \Kmlpandey77\Ndate\Ndate($ad);
//    $date_to_bs = \Kmlpandey77\Ndate\Ndate::to_bs($ad);
//
//    expect("$date")->toBe($bs);
//    expect("$date_to_bs")->toBe($bs);
//});

test('Invalid Date', function () {
    $ad = '2043-11-08';

    expect(fn() => new \Kmlpandey77\Ndate\Ndate($ad))
        ->toThrow(\Kmlpandey77\Ndate\Exceptions\InvalidDateException::class);

});

test('AD date convert to BS Date in Nepali lang', function () {
    $ad = '2023-11-08';
    $bs = '२०८०-०७-२२';

    $date = new \Kmlpandey77\Ndate\Ndate($ad, lang: 'np');
    //    $date_to_bs = \Kmlpandey77\Ndate\Ndate::to_bs($ad, lang: 'np');

    expect("$date")->toBe($bs);
    //    expect("$date_to_bs")->toBe($bs);
});
