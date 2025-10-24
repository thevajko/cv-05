<?php

namespace App\Helpers;

use App\Models\Osoba;

class OsobaLoader
{
    /**
     * Načíta osoby zo súboru CSV a vráti pole objektov Osoba.
     *
     * @param string $cestaKSuboru
     * @return Osoba[]
     */
    public static function nacitajZoSuboru(string $cestaKSuboru): array
    {
        $osoby = [];
        if (!file_exists($cestaKSuboru)) {
            return $osoby;
        }
        $handle = fopen($cestaKSuboru, 'r');
        if ($handle === false) {
            return $osoby;
        }
        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '//')) continue;
            $parts = explode(';', $line);
            if (count($parts) !== 4) continue;
            [$meno, $priezvisko, $pohlavie, $rokNarodenia] = $parts;
            $osoby[] = new Osoba($meno, $priezvisko, $pohlavie, (int)$rokNarodenia);
        }
        fclose($handle);
        return $osoby;
    }
}

