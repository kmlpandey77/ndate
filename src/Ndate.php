<?php

namespace Kmlpandey77\Ndate;

use Carbon\Carbon;
use Kmlpandey77\Ndate\Constants\Year;

class Ndate
{
    public function __construct()
    {
    }

    public function to_bs($date, $format = 'Y-m-d'){
        return new AdToBs($date);
    }

    public function to_ad(){
    }
}