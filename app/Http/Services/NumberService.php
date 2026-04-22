<?php

namespace App\Http\Services;

class NumberService
{
    public static function saveCurrency($value)
    {
        if($value === null) {
            return null;
        }

        return str_replace(',', '.', $value) * 100;
    }

    public static function showCurrency($value)
    {
        return number_format($value / 100, 2, ',', '.');
    }
}
