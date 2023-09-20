<?php
namespace App\Helpers;
use App\Models\Person;

/**
 * Separate class, so statistic logic is not part of page code
 */
class PersonsStats
{
    /**
     * Returns the youngest person
     * @param $persons Person[]
     * @return Person
     */
    static public function getYoungest($persons){

        $y = $persons[0];
        foreach ($persons as $person) {
            if ($person->getYear() > $y->getYear() ) {
                $y = $person;
            }
        }
        return $y;
    }

    /**
     * Return the oldest person
     * @param $persons Person[]
     * @return Person
     */
    static public  function getOldest($persons){
        $o = $persons[0];
        foreach ($persons as $person) {
            if ($person->getYear() < $o->getYear() ) {
                $o = $person;
            }
        }
        return $o;
    }

    /**
     * Counts males and females
     * @param $persons Person[]
     * @return array
     */
    static public function getMaleFemaleCounts($persons){
        $m = 0;
        $f = 0;

        foreach ($persons as $person) {
            if ($person->getSex() == "f") {
                $f++;
            } else {
                $m++;
            }
        }

        return [
            'm' => $m,
            'f' => $f
        ];
    }

    /**
     * Returns years that is most common in person list with count
     * @param $persons Person[]
     * @return array
     */
    static public function getMostCommonYear($persons){
        $years = [];

        // first count years themselves
        foreach ($persons as $person) {
            @$years[$person->getYear()] += 1;
        }

        // pick one with most counts
        $y = array_key_first($years);
        foreach ($years as $year => $count) {
            if ($years[$y] < $years[$year]) {
                $y = $year;
            }
        }

        return [$y, $years[$y]];
    }
}