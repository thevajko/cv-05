<?php

namespace App\Helpers;

use InvalidArgumentException;

/**
 * Small helper for common calculations.
 */
class Calculations
{
    /**
     * Compute factorial of a non-negative integer.
     *
     * Uses GMP if available, then BCMath, otherwise native integers.
     * Returns result as a string to avoid overflow issues.
     *
     * @param int $n
     * @return string
     * @throws InvalidArgumentException
     */
    public static function factorial(int $n): string
    {
        if ($n < 0) {
            throw new InvalidArgumentException('Parameter $n must be >= 0.');
        }

        if ($n === 0 || $n === 1) {
            return '1';
        }

        // Use GMP if available (fast, arbitrary precision)
        if (extension_loaded('gmp') && function_exists('gmp_fact')) {
            return gmp_strval(gmp_fact($n));
        }

        // Use BCMath if available (arbitrary precision via strings)
        if (function_exists('bcmul')) {
            $result = '1';
            for ($i = 2; $i <= $n; $i++) {
                $result = bcmul($result, (string)$i);
            }
            return $result;
        }

        // Fallback to native integers (may overflow for large n)
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }

        return (string)$result;
    }
}

