<?php

namespace App\Models;

/**
 * Simple Person model used by helper functions and views.
 */
class Person
{
    /** @var string|null */
    private $name;

    /** @var string|null */
    private $surname;

    /** @var string|null */
    private $sex;

    /** @var int|null */
    private $year;

    /**
     * Person constructor.
     * @param string|null $name
     * @param string|null $surname
     * @param string|null $sex
     * @param int|string|null $year
     */
    public function __construct($name = null, $surname = null, $sex = null, $year = null)
    {
        $this->name = $name !== null ? (string)$name : null;
        $this->surname = $surname !== null ? (string)$surname : null;
        $this->sex = $sex !== null ? (string)$sex : null;
        $this->year = $year !== null && $year !== '' ? (int)$year : null;
    }

    /** @return string|null */
    public function getName()
    {
        return $this->name;
    }

    /** @return string|null */
    public function getSurname()
    {
        return $this->surname;
    }

    /** @return string|null */
    public function getSex()
    {
        return $this->sex;
    }

    /** @return int|null */
    public function getYear()
    {
        return $this->year;
    }
}

