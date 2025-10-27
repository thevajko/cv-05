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
        return $this->html(['people' => $people]);
    }
}
