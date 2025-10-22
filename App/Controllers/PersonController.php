<?php

namespace App\Controllers;

use App\Helpers\PersonHelper;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class PersonController
 * @package App\Controllers
 */
class PersonController extends BaseController
{
    /**
     * Displays a list of persons with sorting and filtering options.
     *
     * @param Request $request The HTTP request object containing query parameters for sorting and filtering.
     * @return Response The response object containing the rendered HTML for the persons list.
     */
    public function index(Request $request): Response
    {
        // loads all persons from file
        $persons = PersonHelper::loadFromCsvFile("../data/osoby.csv");

        $sortBy = $request->get('sort');

        // sorts the persons in array
        $persons = PersonHelper::sort($persons, !empty($sortBy) ? $sortBy : "s", 1);

        $yearsArray = PersonHelper::getYearsArray($persons);
        $filterYear = $request->get('year');

        if ($filterYear) {
            $persons = PersonHelper::filterByYear($persons, $filterYear);
        }

        return $this->html(compact('persons', 'yearsArray', 'filterYear', 'sortBy'));
    }

    /**
     * Displays statistics about persons.
     *
     * @return Response The response object containing the rendered HTML for the statistics page.
     */
    public function statistics() : Response {

        $persons = PersonHelper::loadFromCsvFile("../data/osoby.csv");

        $youngest = PersonHelper::getYoungest($persons);
        $oldest = PersonHelper::getOldest($persons);
        $maleFemaleCounts = PersonHelper::getMaleFemaleCounts($persons);
        $mostCommonYear =  PersonHelper::getMostCommonYear($persons);

        return $this->html(compact('youngest', 'oldest', 'maleFemaleCounts', 'mostCommonYear'));
    }
}