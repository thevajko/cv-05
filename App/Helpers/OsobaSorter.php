<?php

namespace App\Helpers;

use App\Models\Osoba;

class OsobaSorter
{
    /**
     * Zoradí pole osôb podľa zvoleného atribútu a smeru.
     *
     * @param Osoba[] $osoby
     * @param string $sortBy
     * @param string $sortDir
     * @return Osoba[]
     */
    public static function zorad(array $osoby, string $sortBy, string $sortDir = 'desc'): array
    {
        $getterMap = [
            'meno' => fn(Osoba $o) => $o->getMeno(),
            'priezvisko' => fn(Osoba $o) => $o->getPriezvisko(),
            'pohlavie' => fn(Osoba $o) => $o->getPohlavie(),
            'rokNarodenia' => fn(Osoba $o) => $o->getRokNarodenia(),
            'vek' => fn(Osoba $o) => $o->getVek(),
        ];
        $getter = $getterMap[$sortBy] ?? $getterMap['vek'];
        usort($osoby, function (Osoba $a, Osoba $b) use ($getter, $sortDir) {
            $valA = $getter($a);
            $valB = $getter($b);
            if ($valA == $valB) return 0;
            if ($sortDir === 'asc') {
                return ($valA < $valB) ? -1 : 1;
            } else {
                return ($valA > $valB) ? -1 : 1;
            }
        });
        return $osoby;
    }
}
