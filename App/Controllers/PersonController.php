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
        $people = PersonHelper::loadFromCsvFile($file);

        $sort = $request->get('sort') ?? 'surname';
        $dir = strtolower($request->get('dir') ?? 'asc');
        $asc = $dir === 'asc' ? 1 : -1;
        $allowed = ['name', 'surname', 'year', 'sex'];
        if (!in_array($sort, $allowed, true)) {
            $sort = 'surname';
        }
        $people = PersonHelper::sort($people, $sort, $asc);
        return $this->html([
            'people' => $people,
            'sort' => $sort,
            'dir' => $dir
        ]);
    }
}
