<?php

namespace Kmlpandey77\Ndate\Traits;

use Kmlpandey77\Ndate\Constants\Month;
use Kmlpandey77\Ndate\Helper;

trait ToDateStringTrait
{
    private string $format = 'Y-m-d';

    public function format(string $format = null): string
    {
        $format = $format ?? $this->format;

        $format_string = preg_replace("/[^a-zA-Z]+/", "", $format);
        $format_string = str_split($format_string);

        $search = [];
        $replace = [];

        foreach ($format_string as $key) {
            $method = self::FORMATTER[$key];

            if (method_exists(self::class, $method)) {
                $replace[] = $this->$method();
            } elseif (property_exists(self::class, $method)) {
                $replace[] = $this->$method;
            }else{
                $replace[] = $key;
            }

            $search[] = $key;
        }

        return str_replace($search, $replace,$format);
    }

    function month_with_leading_zero():string{
        return Helper::addLeadingZeros($this->month, 2);
    }

    function day_with_leading_zero():string{
        return Helper::addLeadingZeros($this->day, 2);
    }
    function month_name():string{
        return Month::NP_EN[$this->month - 1];
    }
}