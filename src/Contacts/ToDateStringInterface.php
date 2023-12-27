<?php

namespace Kmlpandey77\Ndate\Contacts;

interface ToDateStringInterface
{
    const FORMATTER = [
        'Y' => 'year',
        'm' => 'month_with_leading_zero',
        'M' => 'month_name',
        'd' => 'day_with_leading_zero',
    ];

    public function format(?string $format): string;
    function month_with_leading_zero():string;
    function day_with_leading_zero():string;
    function month_name():string;
}