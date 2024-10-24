<?php

namespace App\Models;
class Person extends \App\Core\Model
{
    private string $name;
    private string $surname;
    private int $year;
    private string $sex;

    public function __construct(string $name, string $surname, string $sex, int $year)
    {

        $this->name = $name;
        $this->surname = $surname;
        $this->year = $year;
        $this->sex = $sex;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }
}