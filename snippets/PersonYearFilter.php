<?php

/**
 * Contains loginc needed to show and filter persons by year
 */
class PersonYearFilter
{
    /**
     * Get array of years present in given person array. Result is sorted.
     * @param $persons
     * @return array
     */
    public static function getYearsArray($persons){

        $years = [];
        foreach ($persons as $person) {
            // same year is stored in same index. This will create
            // array of years without duplicates
            $years[$person->getYear()] = $person->getYear();
        }
        // key and value in this array are the same.
        // So using sorting by array index
        ksort($years);
        return $years;
    }

    /**
     * Returns only persons with set year
     * @param $persons
     * @param $year
     * @return array
     */
    public static function filterByYear($persons, $year) {

        $filteredPersons = [];
        foreach ($persons as $person) {
            // if person`s year match, put it into result
           if ($person->getYear() == $year) {
               $filteredPersons[] = $person;
           };
        }
        return $filteredPersons;
    }
}