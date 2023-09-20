<?php
namespace App\Models;
class Person
{
    private $name;
    private $surname;
    private $sex;
    private $year;

    /**
     * @param $name
     * @param $surname
     * @param $sex
     * @param $year
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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }



}