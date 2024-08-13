<?php

declare(strict_types=1);

namespace Kmlpandey77\Ndate;

use Carbon\Carbon;
use Kmlpandey77\Ndate\Constants\Year;
use Kmlpandey77\Ndate\Exceptions\InvalidDateException;

class BsToAd
{
    public Carbon $finalDate;

    /**
     * @throws InvalidDateException
     */
    public function __construct(
        public string $date,
        public string $format = 'Y-m-d',
        public string $lang = 'en'
    ) {
        $this->validateDate();
        $this->convert();
    }

    /**
     * @throws InvalidDateException
     */
    private function validateDate(): void
    {
        [$year, $month, $day] = explode('-', $this->date);

        if ($year < Year::BS_YEAR || $year > Year::BS_END_YEAR) {
            throw new InvalidDateException('Invalid date');
        }

        if ($month < 1 || $month > 12) {
            throw new InvalidDateException('Invalid date');
        }

        if ($day < 1 || $day > 32) {
            throw new InvalidDateException('Invalid date');
        }
    }

    private function convert(): void
    {
        [$yy, $mm, $dd] = explode('-', $this->date);

        $defEyy = Year::AD_YEAR;
        $defEmm = Year::AD_MONTH;
        $defEdd = Year::AD_DAY - 1;
        $defNyy = Year::BS_YEAR;

        $totalNDays = $this->calculateTotalNDays((int)$yy, (int)$mm, (int)$dd, $defNyy);
        $this->finalDate = $this->calculateAdDate($totalNDays, $defEyy, $defEmm, $defEdd);
    }

    private function calculateTotalNDays(int $yy, int $mm, int $dd, int $defNyy): int
    {
        $totalNDays = 0;
        $currentYearIndex = 0;

        for ($i = 0; $i < ($yy - $defNyy); $i++) {
            for ($j = 1; $j <= 12; $j++) {
                $totalNDays += Year::BS[$currentYearIndex][$j];
            }
            $currentYearIndex++;
        }

        for ($j = 1; $j < $mm; $j++) {
            $totalNDays += Year::BS[$currentYearIndex][$j];
        }

        return $totalNDays + $dd;
    }

    private function calculateAdDate(int $totalNDays, int $year, int $month, int $day): Carbon
    {
        $monthDays = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $leapMonthDays = [0, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $dayOfWeek = 7;

        while ($totalNDays > 0) {
            $daysInMonth = $this->isLeapYear($year) ? $leapMonthDays[$month] : $monthDays[$month];

            $day++;
            $dayOfWeek++;
            $totalNDays--;

            if ($day > $daysInMonth) {
                $month++;
                $day = 1;

                if ($month > 12) {
                    $year++;
                    $month = 1;
                }
            }

            if ($dayOfWeek > 7) {
                $dayOfWeek = 1;
            }
        }

        $formattedMonth = str_pad((string)$month, 2, '0', STR_PAD_LEFT);
        $formattedDay = str_pad((string)$day, 2, '0', STR_PAD_LEFT);

        return Carbon::parse("$year-$formattedMonth-$formattedDay");
    }

    public function isLeapYear(int $year): bool
    {
        return ($year % 400 == 0) || (($year % 100 != 0) && ($year % 4 == 0));
    }

    public function __toString(): string
    {
        return $this->finalDate->format($this->format);
    }
}
