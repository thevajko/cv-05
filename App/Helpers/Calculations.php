<?php declare(strict_types=1);

namespace App\Helpers;

use InvalidArgumentException;

/**
 * Helper for basic mathematical calculations.
 */
class Calculations
{
    /**
     * Compute factorial using an iterative approach.
     *
     * @param int $n Non-negative integer
     * @return int Factorial of $n
     * @throws InvalidArgumentException for negative input
     */
    public static function factorial(int $n): int
    {
        if ($n < 0) {
            throw new InvalidArgumentException('Negative numbers are not allowed.');
        }

        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }

        return $result;
    }

    /**
     * Compute factorial using a recursive approach.
     *
     * @param int $n Non-negative integer
     * @return int Factorial of $n
     * @throws InvalidArgumentException for negative input
     */
    public static function factorialRecursive(int $n): int
    {
        if ($n < 0) {
            throw new InvalidArgumentException('Negative numbers are not allowed.');
        }

        return $n <= 1 ? 1 : $n * self::factorialRecursive($n - 1);
    }
}

