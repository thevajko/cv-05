<?php

namespace App\Models;
class Person
{
    private string $name;
    private string $surname;
    private string $sex;
    private int $year;

    /**
     * Person constructor.
     *
     * @param string $name
     * @param string $surname
     * @param string $sex
     * @param int $year
     */
    public function __construct($name, $surname, $sex, $year)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->sex = $sex;
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }
}

