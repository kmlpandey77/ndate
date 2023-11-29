<?php

namespace Kmlpandey77\Ndate;

class Helper
{
    public static function addLeadingZeros($number, $width): string
    {
        return str_pad($number, $width, '0', STR_PAD_LEFT);
    }
}
