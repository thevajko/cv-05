<?php

namespace App\Models;

/**
 * Class Person - model for a person, compatible with PersonHelper usage.
 */
class Person
{
    private ?string $name;
    private ?string $surname;
    private ?string $sex;
    private ?int $year;

    public function __construct($name, $surname, $sex, $year)
    {
        $this->name = $name !== '' ? $name : null;
        $this->surname = $surname !== '' ? $surname : null;
        $this->sex = $sex !== '' ? $sex : null;
        $this->year = is_numeric($year) ? (int)$year : null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * Returns the age of the person based on the current year (or a given year).
     */
    public function getAge(?int $currentYear = null): ?int
    {
        if ($this->year === null) return null;
        if ($currentYear === null) {
            $currentYear = (int)date('Y');
        }
        if ($this->year > 0 && $this->year <= $currentYear) {
            return $currentYear - $this->year;
        }
        return null;
    }
}

