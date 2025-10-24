<?php

namespace App\Helpers;

class Calculations
{
    /**
     * Calculate the factorial of a non-negative integer.
     *
     * @param int $n
     * @return int|float
     * @throws \InvalidArgumentException
     */
    public static function factorial(int $n)
    {
        if ($n < 0) {
            throw new \InvalidArgumentException('Factorial is not defined for negative numbers.');
        }
        if ($n === 0 || $n === 1) {
            return 1;
        }
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }
}

