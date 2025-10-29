<?php

namespace App\Controllers;

use App\Helpers\PersonHelper;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class PersonController extends BaseController
{
    /**
     * Allow all actions by default.
     *
     * @param string $action
     * @return bool
     */
    public function authorize(string $action): bool
    {
        return true;
    }

    /**
     * Index action - load persons from CSV and show them.
     * Supports server-side filtering by year and sorting by column via GET params:
     * - year: filter by year (exact match)
     * - sort: one of name|surname|sex|year
     * - dir: asc|desc
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $filePath = __DIR__ . '/../../data/osoby.csv';
        $persons = [];
        if (file_exists($filePath)) {
            $persons = PersonHelper::loadFromCsvFile($filePath);
        }

        // prepare unique years using helper
        $years = PersonHelper::getYearsArray($persons);

        // read request params
        $selectedYear = $request->get('year') ?? '';
        $sort = $request->get('sort') ?? '';
        $dir = strtolower($request->get('dir') ?? 'asc');
        $dir = $dir === 'desc' ? 'desc' : 'asc';

        // apply year filter if provided using helper
        if ($selectedYear !== null && $selectedYear !== '') {
            $persons = PersonHelper::filterByYear($persons, $selectedYear);
        }

        // apply sorting if requested using helper (asc param: 1 for asc, other for desc)
        if (in_array($sort, ['name', 'surname', 'sex', 'year'], true)) {
            $ascInt = $dir === 'asc' ? 1 : 0;
            $persons = PersonHelper::sort($persons, $sort, $ascInt);
        }

        return $this->html([
            'persons' => $persons,
            'years' => $years,
            'selectedYear' => $selectedYear,
            'sort' => $sort,
            'dir' => $dir,
        ]);
    }
}
