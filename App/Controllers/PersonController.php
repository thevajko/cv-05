<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\PersonsLoader;
class PersonController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html([
            'persons' => PersonsLoader::loadPersonsFromCSV("data/osoby.csv")
        ]);

    }
}