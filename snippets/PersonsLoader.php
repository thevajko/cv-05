<?php

/**
 * Separate class, so loading logic is not part of page code
 */
class PersonsLoader
{
    /**
     * Static method for loading persons from a file
     * @param $filePath
     * @return Person[]
     */
    public static function loadPersonsFromCSV($filePath) {

        // array to return with persons
        $persons = [];
        // load whole text file
        $wholeFile = file_get_contents($filePath);
        // break into line array
        $allLines = explode(PHP_EOL, $wholeFile);

        // iterate through all ines
        foreach ( $allLines as $line) {
            $personData =  explode(";", $line);
            $persons[] = new Person($personData[0],$personData[1],$personData[2],$personData[3]);
        }

        return $persons;
    }
}