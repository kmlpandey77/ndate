<?php

namespace Kmlpandey77\Ndate;

use Exception;

class Ndate
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public static function to_bs($date, $format = 'Y-m-d'): AdToBs
    {
        return new AdToBs($date);
    }

    public function to_ad()
    {
    }
}
