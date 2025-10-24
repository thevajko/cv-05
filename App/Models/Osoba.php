<?php

namespace App\Models;

class Osoba
{
    private string $meno;
    private string $priezvisko;
    private string $pohlavie;
    private int $rokNarodenia;

    public function __construct(string $meno, string $priezvisko, string $pohlavie, int $rokNarodenia)
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->pohlavie = $pohlavie;
        $this->rokNarodenia = $rokNarodenia;
    }

    public function getMeno(): string
    {
        return $this->meno;
    }
    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }
    public function setPriezvisko(string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    public function getPohlavie(): string
    {
        return $this->pohlavie;
    }
    public function setPohlavie(string $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

    public function getRokNarodenia(): int
    {
        return $this->rokNarodenia;
    }
    public function setRokNarodenia(int $rokNarodenia): void
    {
        $this->rokNarodenia = $rokNarodenia;
    }

    public function getVek(): int
    {
        $aktualnyRok = (int)date('Y');
        if ($this->rokNarodenia > 0) {
            return $aktualnyRok - $this->rokNarodenia;
        }
        return 0;
    }
}
