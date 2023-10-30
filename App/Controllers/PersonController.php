<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\PersonsLoader;

class PersonController extends AControllerBase
{

    public function index(): Response
    {
        $persons = PersonsLoader::loadPersonsFromCSV('data/osoby.csv');
        return $this->html(
            [
                'persons' => $persons
            ]
        );
    }
}