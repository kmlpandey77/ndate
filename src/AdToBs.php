<?php

declare(strict_types=1);

namespace Kmlpandey77\Ndate;

use Carbon\Carbon;
use Exception;
use Kmlpandey77\Ndate\Constants\Year;
use Kmlpandey77\Ndate\Contacts\ToDateStringInterface;
use Kmlpandey77\Ndate\Traits\ToDateStringTrait;

class AdToBs implements ToDateStringInterface
{
    use ToDateStringTrait;

    public int $year;

    public int $month;

    public int $day;

    public int $number_of_day;

    /**
     * @throws Exception
     */
    public function __construct($date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::now();

        $this->setDateConstant();

        $this->eng_to_nep($date->format('Y-m-d'));
    }

    /**
     * Ad date convert to bs date
     *
     * @throws Exception
     */
    public function eng_to_nep($date): void
    {
        $total_ad_days = $this->getTotalAdDays($date);

        $i = 0;
        $j = Year::BS_MONTH;
        $total_bs_days = Year::BS_DAY;

        while ($total_ad_days != 0) {
            $current_month_days = Year::BS[$i][$j];

            $total_bs_days++;
            $this->number_of_day++;

            if ($total_bs_days > $current_month_days) {
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
        }

        $this->day = $total_bs_days;
    }

    /**
     * Calculate total days to convert
     *
     * @throws Exception
     */
    private function getTotalAdDays($date): int
    {
        $start_date = new \DateTimeImmutable(Year::AD_START_DATE);
        $end_date = new \DateTimeImmutable($date);

        return (int) $end_date->diff($start_date)->format('%a');
    }

    /**
     * Set up initial date data
     */
    private function setDateConstant(): void
    {
        $this->year = Year::BS_YEAR;
        $this->month = Year::BS_MONTH;
        $this->day = Year::BS_DAY;
        $this->number_of_day = Year::BS_NUMBER_OF_DAY;
    }

    public function __toString()
    {
        return $this->format();

        $date = $this->year;
        $date .= '-';
        $date .= Helper::addLeadingZeros($this->month, 2);
        $date .= '-';
        $date .= Helper::addLeadingZeros($this->day, 2);

        return $date;
    }
}
