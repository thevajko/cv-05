<?php

namespace App\Helpers;

class PersonYearFilter
{
    public static function getYearsArray($persons){
        $years = [];
        foreach ($persons as $person) {
            $years[$person->getYear()] = $person->getYear();
        }
        ksort($years);
        return $years;
    }

    public static function filterByYear($persons, $year) {

        $filteredPersons = [];

        foreach ($persons as $person) {
           if ($person->getYear() == $year) {
               $filteredPersons[] = $person;
           };
        }
        return $filteredPersons;
    }
}