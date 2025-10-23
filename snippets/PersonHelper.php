<?php


use App\Models\Person;
use Collator;

/**
 * Consolidated helper for operations on Person collections.
 *
 * This class merges functionality previously split across:
 * - PersonsLoader
 * - PersonSorter
 * - PersonYearFilter
 * - PersonsStats
 */
class PersonHelper
{
    /**
     * Load persons from a semicolon-separated CSV file.
     *
     * @param string $filePath
     * @return Person[]
     */
    public static function loadFromCsvFile(string $filePath): array
    {
        $persons = [];
        $wholeFile = file_get_contents($filePath);
        $allLines = explode(PHP_EOL, $wholeFile);

        foreach ($allLines as $line) {
            if ($line === '' || $line === false) {
                // keep behavior close to original; skip empty lines
                continue;
            }
            $personData = explode(";", $line);
            // Be tolerant to missing columns; fill with nulls to preserve original indexing
            $name = $personData[0] ?? null;
            $surname = $personData[1] ?? null;
            $sex = $personData[2] ?? null;
            $year = $personData[3] ?? null;
            $persons[] = new Person($name, $surname, $sex, $year);
        }

        return $persons;
    }

    /**
     * Sort an array of Person objects by a given parameter and order.
     *
     * @param Person[] $array
     * @param string $param name|surname|year|sex
     * @param int $asc 1 for ascending, other for descending
     * @return Person[]
     */
    public static function sort(array $array, string $param, int $asc): array
    {
        $c = new Collator('sk');
        $asc = $asc != 1 ? -1 : 1;

        usort($array, function (Person $a, Person $b) use ($c, $asc, $param) {
            switch ($param) {
                case 'name':
                    return $c->compare($a->getName(), $b->getName()) * $asc;
                case 'year':
                    return ((int)$a->getYear() - (int)$b->getYear()) * $asc;
                case 'sex':
                    return $c->compare($a->getSex(), $b->getSex()) * $asc;
                case 'surname':
                default:
                    return $c->compare($a->getSurname(), $b->getSurname()) * $asc;
            }
        });

        return $array;
    }

    /**
     * Build a sorted array of years present in the persons list (unique, ascending).
     *
     * @param Person[] $persons
     * @return array<int,int>
     */
    public static function getYearsArray(array $persons): array
    {
        $years = [];
        foreach ($persons as $person) {
            $years[$person->getYear()] = $person->getYear();
        }
        ksort($years);
        return $years;
    }

    /**
     * Filter persons by a specific year.
     *
     * @param Person[] $persons
     * @param int|string $year
     * @return Person[]
     */
    public static function filterByYear(array $persons, $year): array
    {
        $filteredPersons = [];
        foreach ($persons as $person) {
            if ($person->getYear() == $year) {
                $filteredPersons[] = $person;
            }
        }
        return $filteredPersons;
    }

    /**
     * Return the youngest person (highest year).
     *
     * @param Person[] $persons
     * @return Person
     */
    public static function getYoungest(array $persons): Person
    {
        $y = $persons[0];
        foreach ($persons as $person) {
            if ($person->getYear() > $y->getYear()) {
                $y = $person;
            }
        }
        return $y;
    }

    /**
     * Return the oldest person (lowest year).
     *
     * @param Person[] $persons
     * @return Person
     */
    public static function getOldest(array $persons): Person
    {
        $o = $persons[0];
        foreach ($persons as $person) {
            if ($person->getYear() < $o->getYear()) {
                $o = $person;
            }
        }
        return $o;
    }

    /**
     * Count males and females.
     *
     * @param Person[] $persons
     * @return array{m:int,f:int}
     */
    public static function getMaleFemaleCounts(array $persons): array
    {
        $m = 0;
        $f = 0;
        foreach ($persons as $person) {
            if ($person->getSex() == 'f') {
                $f++;
            } else {
                $m++;
            }
        }
        return ['m' => $m, 'f' => $f];
    }

    /**
     * Returns the most common year and its count.
     *
     * @param Person[] $persons
     * @return array{0:int|string,1:int}
     */
    public static function getMostCommonYear(array $persons): array
    {
        $years = [];
        foreach ($persons as $person) {
            @$years[$person->getYear()] += 1;
        }
        $y = array_key_first($years);
        foreach ($years as $year => $count) {
            if ($years[$y] < $years[$year]) {
                $y = $year;
            }
        }
        return [$y, $years[$y]];
    }
}
