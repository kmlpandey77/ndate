<?php

namespace Test;

use Kmlpandey77\Ndate\Ndate;
use PHPUnit\Framework\TestCase;

class NdateTest extends TestCase
{
    public function test_english_date_to_nepali_date()
    {
        $date = new Ndate('2023-11-07');

        var_dump($date);

        exit();



    }

}