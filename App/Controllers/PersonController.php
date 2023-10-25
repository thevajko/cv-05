<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\PersonsLoader;
use App\Helpers\PersonSorter;
use App\Helpers\PersonsStats;
use App\Helpers\PersonYearFilter;

class PersonController extends AControllerBase
{

    public function index(): Response
    {
        // loads all persons from file
        $persons = PersonsLoader::loadPersonsFromCSV("data/osoby.csv");

        $sortBy = $this->request()->getValue('sort');

        // sorts the persons in array
        $persons = PersonSorter::sort($persons, !empty($sortBy) ? $sortBy : "s", 1);

        $yearsArray = PersonYearFilter::getYearsArray($persons);
        $filterYear = $this->request()->getValue('year');

        if ($filterYear) {
            $persons = PersonYearFilter::filterByYear($persons, $filterYear);
        }


        return $this->html([
            'persons' => $persons,
            'yearsArray' => $yearsArray
        ]);

    }

    public function statistics() : Response {

        $persons = PersonsLoader::loadPersonsFromCSV("data/osoby.csv");

        $youngest = PersonsStats::getYoungest($persons);
        $oldest = PersonsStats::getOldest($persons);
        $maleFemaleCounts = PersonsStats::getMaleFemaleCounts($persons);
        $mostCommonYear =  PersonsStats::getMostCommonYear($persons);

        return $this->html(compact('youngest', 'oldest', 'maleFemaleCounts', 'mostCommonYear'));
    }
}