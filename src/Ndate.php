<?php

namespace Kmlpandey77\Ndate;

use Exception;

class Ndate
{
    const BS = 1;
    const AD = 2;

    const EN = 'en';
    const NP = 'np';

    /**
     * @throws Exception
     */
    public static function to_bs(?string $date = null, ?string $format = null, string $lang = 'en')
    {
        return new AdToBs($date, $format, $lang);
    }
}
