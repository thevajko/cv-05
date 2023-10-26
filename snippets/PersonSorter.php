<?php

/**
 * Separate class, so sorting logic is not part of page code
 */
class PersonSorter
{
    /**
     * Static method for sorting persons array
     * @param $array array to sort
     * @param $param attribute name for sorting
     * @param $asc order of sorting. 1=ASC -1=DESC
     * @return Person[]
     */
    public static function sort($array, $param, $asc){
        // Collator is needed to correctly sort strings with diacritics
         $c = new Collator('sk');

         // turn all other values except for 1 to -1
         $asc = $asc != 1 ? -1 : 1;

         // using usort with callback, so is possible to use custom sorting logic
         usort($array, function (Person $a, Person $b) use ($c, $asc, $param) {
            // this closure uses param as attribute selector
            switch ($param) {
                case 'name' :
                    // $asc is used to reverse order of sorting if needed
                    return  $c->compare($a->getName(), $b->getName())*$asc;
                case 'year' :
                    // years needs to be compared as numbers, not as string
                    // using string to compare number causes error in ordering
                    return  ($a->getYear() - $b->getYear())*$asc;
                case 'sex' :
                    return  $c->compare($a->getSex(), $b->getSex())*$asc;
                default:
                case 'surname' :
                    return  $c->compare($a->getSurname(), $b->getSurname())*$asc;
            }
         });
         return $array;
     }
}