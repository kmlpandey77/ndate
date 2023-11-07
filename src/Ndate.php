<?php

namespace Kmlpandey77\Ndate;

use Kmlpandey77\Ndate\Constants\Year;

class Ndate
{

    public function __construct($date = '2023-11-07')
    {
        $date = strtotime($date);
        $this->eng_to_nep($date);

        var_dump($date);
        exit;
    }

    public function eng_to_nep($date)
    {
        $d_year = date('Y', $date);
        $d_month = date('m', $date);
        $d_day = date('d', $date);

        $month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $lmonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $def_eyy = 1944;
        $def_nyy = 2000;
        $def_nmm = 9;
        $def_ndd = 17 - 1;
        $total_eDays = 0;
        $total_nDays = 0;
        $a = 0;
        $day = 7 - 1;
        $m = 0;
        $y = 0;
        $i = 0;
        $j = 0;
        $numDay = 0;

        var_dump($d_year - $def_eyy);
        exit();

        // Count total no. of days in terms of year
        for ($i = 0; $i < ($d_year - $def_eyy); $i++) {
            if ($this->is_leap_year($def_eyy + $i)) {
                $total_eDays += array_sum($lmonth);
            } else {
                $total_eDays += array_sum($month);
            }
        }

        // Count total no. of days in terms of month
        for ($i = 0; $i < ($d_month - 1); $i++) {
            $total_eDays += date('L', $date) ? $lmonth[$i] : $month[$i];
        }

        // Count total no. of days in terms of date
        $total_eDays += $d_day;

        $i = 0;
        $j = $def_nmm;
        $total_nDays = $def_ndd;
        $m = $def_nmm;
        $y = $def_nyy;

        // Count Nepali date from array
        while ($total_eDays != 0) {
            $a = Year::BS[$i][$j];
            $total_nDays++;
            $day++;

            var_dump($a, $i, $j);
            exit();
            if ($total_nDays > $a) {
                $m++;
                $total_nDays = 1;
                $j++;
            }
            if ($day > 7) {
                $day = 1;
            }
            if ($m > 12) {
                $y++;
                $m = 1;
            }
            if ($j > 12) {
                $j = 1;
                $i++;
            }
            $total_eDays--;
        }

        $numDay = $day;

        $nep_date["year"] = $this->npnum($y);
        $nep_date["month"] = $this->npnum($m);
        $nep_date["date"] = $this->npnum($total_nDays);
        $nep_date["day"] = $this->day_of_week[$day][$this->type];
        $nep_date["nmonth"] = $this->nepali_month[$m][$this->type];
        $nep_date["num_day"] = $numDay;

        return $nep_date;
    }

    public function is_leap_year($year)
    {
        return ($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0;
    }
}