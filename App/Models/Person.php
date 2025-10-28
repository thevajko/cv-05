<?php

declare(strict_types=1);

namespace App\Models;

class Person
{
    private ?string $name;
    private ?string $surname;
    private ?string $sex;
    private $year;

    public function __construct($name, $surname, $sex, $year)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->sex = $sex;
        $this->year = $year;
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

    public function getYear()
    {
        return $this->year;
    }

    public function getAge(): ?int
    {
        $year = (int)$this->year;
        $currentYear = (int)date('Y');
        if ($year > 0 && $year <= $currentYear) {
            return $currentYear - $year;
        }
        return null;
    }
}
