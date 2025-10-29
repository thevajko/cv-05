<?php

namespace App\Helpers;

class Calculation
{
    public static function factorial($n): int
    {
        if ($n < 0) {
            throw new \InvalidArgumentException("Negative numbers do not have a factorial.");
        }
        if ($n === 0 || $n === 1) {
            return 1;
        }
        return $n * static::factorial($n - 1);
    }
}