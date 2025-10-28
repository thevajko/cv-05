<?php

declare(strict_types=1);

namespace App\Models;

class Person
{
    private string $firstName;
    private string $lastName;
    private string $gender;
    private int $yearOfBirth;

    public function __construct(string $firstName, string $lastName, string $gender, int $yearOfBirth)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->yearOfBirth = $yearOfBirth;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getYearOfBirth(): int
    {
        return $this->yearOfBirth;
    }

    public function getAge(): ?int
    {
        $currentYear = (int)date('Y');
        if ($this->yearOfBirth > 0 && $this->yearOfBirth <= $currentYear) {
            return $currentYear - $this->yearOfBirth;
        }
        return null; // invalid year
    }
}

