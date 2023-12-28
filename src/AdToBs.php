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

    protected int $year;

    protected int $month;

    protected int $day;

    protected int $number_of_day;

    protected string $lang;

    /**
     * @throws Exception
     */
    public function __construct($date = null, ?string $format = null, string $lang = 'en')
    {
        $date = $date ? Carbon::parse($date) : Carbon::now();

        if ($format) {
            $this->format = $format;
        }

        $this->lang = $lang;

        $this->setDateConstant();

        $this->convert($date->format('Y-m-d'));
    }

    /**
     * Ad date convert to bs date
     *
     * @throws Exception
     */
    public function convert($date): void
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

    public function lang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getDay(): int|string
    {
        return $this->lang == 'np' ? $this->toNepaliNumber($this->day) : $this->day;
    }

    public function getMonth(): int|string
    {
        return $this->lang == 'np' ? $this->toNepaliNumber($this->month) : $this->month;
    }

    public function getYear(): int|string
    {
        return $this->lang == 'np' ? $this->toNepaliNumber($this->year) : $this->year;
    }

    public function __toString()
    {
        return $this->toStringFormat();
    }

    private function toNepaliNumber($number): string
    {
        $nepaliNumbers = [
            '0' => '०', '1' => '१', '2' => '२', '3' => '३', '4' => '४',
            '5' => '५', '6' => '६', '7' => '७', '8' => '८', '9' => '९',
        ];

        $convertedNumber = '';

        foreach (str_split((string) $number) as $num) {
            $convertedNumber .= $nepaliNumbers[$num] ?? $num;
        }

        return $convertedNumber;
    }
}
