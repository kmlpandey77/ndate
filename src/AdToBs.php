<?php

namespace Kmlpandey77\Ndate;
use Carbon\Carbon;
use Kmlpandey77\Ndate\Constants\Year;

class AdToBs
{
    public $year;
    public $month;
    public $day;
    public $number_of_day;

    public function __construct($date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::now();

        $this->setDateConstant();

        $this->eng_to_nep($date->format('Y-m-d'));
    }

    public function eng_to_nep($date)
    {
        $total_ad_days = $this->getTotalAdDays($date);

        $i = 0;
        $j = Year::BS_MONTH;
        $total_bs_days = Year::BS_DAY;

        while ($total_ad_days != 0) {
            $currentYear = Year::BS[$i][$j];

            $total_bs_days++;
            $this->number_of_day++;

            if ($total_bs_days > $currentYear) {
                $this->month++;
                $total_bs_days = 1;
                $j++;
            }

            $this->number_of_day = ($this->number_of_day > 7) ? 1 : $this->number_of_day;
            $this->month = ($this->month > 12) ? 1 : $this->month;
            $this->year = ($this->month === 1 && $j > 12) ? $this->year + 1 : $this->year;

            if ($j > 12) {
                $j = 1;
                $i++;
            }

            $total_ad_days--;
            var_dump($this);

            die();
        }
    }

    private function getTotalAdDays($date)
    {
        $start_date = new \DateTimeImmutable(Year::AD_START_DATE);
        $end_date = new \DateTimeImmutable($date);

        return (int) $end_date->diff($start_date)->format("%a");
    }

    private function setDateConstant()
    {
        $this->year = Year::BS_YEAR;
        $this->month = Year::BS_MONTH;
        $this->day = Year::BS_DAY;
        $this->number_of_day = Year::BS_NUMBER_OF_DAY;
    }

    public function __toString()
    {
        return "{$this->year}-0{$this->month}-{$this->day}";
    }

}