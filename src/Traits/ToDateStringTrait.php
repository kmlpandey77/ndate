<?php

namespace Kmlpandey77\Ndate\Traits;

use Kmlpandey77\Ndate\Constants\Month;
use Kmlpandey77\Ndate\Constants\Weekday;
use Kmlpandey77\Ndate\Helper;
use Kmlpandey77\Ndate\Ndate;

trait ToDateStringTrait
{
    private string $format = 'Y-m-d';

    /**
     * Date format to string
     */
    protected function toStringFormat(): string
    {

        $formatString = preg_replace('/[^a-zA-Z]+/', '', $this->format);

        $search = str_split($formatString);
        $replace = array_map(function ($key) {
            $method = self::FORMATTER[$key] ?? null;

            if ($method && method_exists(self::class, $method)) {
                return $this->$method();
            } elseif ($method && property_exists(self::class, $method)) {
                return $this->$method;
            }

            return $key;
        }, $search);

        return str_replace($search, $replace, $this->format);
    }

    /**
     * Day of the month, 2 digits with leading zeros
     */
    public function day_with_leading_zero(): string
    {
        $day = Helper::addLeadingZeros($this->day, 2);

        return $this->lang == Ndate::NP
            ? $this->toNepaliNumber($day)
            : $day;
    }

    /**
     * A short name of a day of the week
     */
    public function short_day_name(): string
    {
        return $this->lang == Ndate::NP
            ? Weekday::NP_SHORT[$this->number_of_day - 1]
            : Weekday::EN_SHORT[$this->number_of_day - 1];
    }

    /**
     * A full name of the day of the week
     */
    public function full_day_name(): string
    {
        return $this->lang == Ndate::NP
            ? Weekday::NP[$this->number_of_day - 1]
            : Weekday::EN[$this->number_of_day - 1];
    }

    public function month_with_leading_zero(): string
    {
        $month = Helper::addLeadingZeros($this->month, 2);

        return $this->lang == Ndate::NP
            ? $this->toNepaliNumber($month)
            : $month;
    }

    public function month_name(): string
    {
        return $this->lang == Ndate::NP
            ? Weekday::NP[$this->number_of_day - 1]
            : Month::NP_EN[$this->month - 1];
    }
}
