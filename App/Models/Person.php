<?php

namespace App\Models;

class Person
{
    public function __construct(
        private string $name,
        private string $surname,
        private string $year,
        private string $sex,
    )

    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }
}