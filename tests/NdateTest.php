<?php

namespace Test;

use Kmlpandey77\Ndate\Ndate;
use PHPUnit\Framework\TestCase;

class NdateTest extends TestCase
{
    public function test_english_date_to_nepali_date()
    {
        $ad = '2023-11-07';
        $bs = '2080-07-21';

        $date = (new Ndate)->to_bs($ad);
        var_dump($date);

        $this->assertSame($bs, "$date");

    }

}