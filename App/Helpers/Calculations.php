<?php

namespace App\Helpers;

class Calculations
{
    public static function factorial($n)
    {
        if($n <= 1)
        {
            return 1;
        }
        else
        {
            return $n * Calculations::factorial($n - 1);
        }
    }
}