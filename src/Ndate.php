<?php

namespace Kmlpandey77\Ndate;

use Exception;

class Ndate
{
    const BS = 1;
    const AD = 2;

    const EN = 'en';
    const NP = 'np';


    protected AdToBs $date;

    protected int $type;

    /**
     * @throws Exception
     */
    public function __construct($date, ?string $format = null, ?int $type = null, string $lang = 'en')
    {
        $this->type = $type ?? self::BS;


        $this->date = new AdToBs($date, $format, $lang);
    }

    public function __toString(): string
    {
        return "{$this->date}";
    }

    /**
     * @throws Exception
     */
    public static function to_bs($date, ?string $format = null, string $lang = 'en'): string
    {
        return new AdToBs($date, $format, $lang);
    }
}
