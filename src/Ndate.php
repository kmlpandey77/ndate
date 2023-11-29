<?php

namespace Kmlpandey77\Ndate;

class Ndate
{
    public function __construct()
    {
    }

    public static function to_bs($date, $format = 'Y-m-d')
    {
        return new AdToBs($date);
    }

    public function to_ad()
    {
    }
}
