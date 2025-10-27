<?php

namespace App\Controllers;

use App\Helpers\PersonHelper;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class PersonController extends BaseController
{
    public function index(Request $request): Response
    {
        $file = __DIR__ . '/../../data/osoby.csv';
        $people = \App\Helpers\PersonHelper::loadFromCsvFile($file);

        // Zoradenie podľa query parametrov
        $sort = $request->get('sort', 'surname'); // default: priezvisko
        $asc = (int)$request->get('asc', 1); // default: vzostupne
        $allowed = ['name', 'surname', 'sex', 'year'];
        if (in_array($sort, $allowed, true)) {
            $people = \App\Helpers\PersonHelper::sort($people, $sort, $asc);
        }

        return $this->html([
            'people' => $people,
            'sort' => $sort,
            'asc' => $asc
        ]);
    }
}
