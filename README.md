# VAII Cvičenie 05
Momentálne je otvorená branch __SOLUTION__, ktorá obsahuje riešenie. _Štartér_ obsahuje branch  __MAIN__.

## Úlohy

1. Premiestnite funkcionalitu pre výpočet faktoriálu do samostatnej triedy `Calculation`
   * Zobrazte výpočet faktoriálu na vlastnej stránke z ohľadom na architektúru __MVC__.
2. Doplňte do stránky výpis 10 nadpisov.
   * Použite ľubovolný HTML nadpis a v texte každého uveďte jeho číslo.
3. Z predchádzajúceho cvičenia skopírujte triedu pre _načítanie osôb_, _výpočet štatistík_ a jej _model_. Pozor na doplnenie do správneho namespace.
   * Pre osoby vytvorte samostatný controller 
     * Index bude zobrazovať zatiaľ iba zoznam osôb v podobe HTML zoznamu
     * Štatistiky budú na samostatnej stránke
4. Osoby zobrazte v HTML tabuľke.
    * Tabuľka bude mať hlavičku
    * Na hlavičku sa bude dať kliknúť, a to nám zoradí tabuľku podla daného stĺpca. Logika zoraďovania bude v extra triede.
    * Následne doplníme zoraďovanie oboma smermi
5. Filtrovanie podľa roku
    * Pod tabuľku vypíšte roky, ktoré majú osoby v zozname (bez duplicít)
    * Kliknutím na daný rok, zobrazte iba tie osoby, ktoré tento rok majú
    * Nezabudnite, že zoraďovanie tabuľky musí fungovať aj s filtrom rokov
    * Pridajte možnosť vypnúť filtrovanie podľa roku
    * Logika filtrovania bude vo vlastnej triede

Kód frameworku je kompletne okomentovaný. V prípade, že na pochopenie potrebujete dodatočné informácie,
navštívte [WIKI stránky](https://github.com/thevajko/vaiicko/wiki/00-%C3%9Avodn%C3%A9-inform%C3%A1cie).

## Ako nájsť branch môjho cvičenia?
Pokiaľ sa chcete dostať k riešeniu z cvičenia je potrebné otvoriť si príslušnú _branch_, ktorej názov sa skladá:

__MIESTNOST__ + "-" + __HODINA ZAČIATKU__ + "-" + __DEN__

Ak teda navštevujete cvičenie pondelok o 08:00 v RA323, tak sa branch bude volať: __RA323-08-PON__

# Použitý framework

Cvičenie používa framework vaiicko dostupný na repe [https://github.com/thevajko/vaiicko](https://github.com/thevajko/vaiicko)
