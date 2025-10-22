<?php

use App\Models\Person;

/** @var Person $youngest */
/** @var Person $oldest */
/** @var array $maleFemaleCounts */
/** @var array $mostCommonYear */

?>
<div class="row">
    <div class="col">
        <h2>Štatistiky</h2>
        <p>Najmladšia osoba je <?php echo "{$youngest->getSurname()}, {$youngest->getName()} ({$youngest->getYear()})" ?>.</p>
        <p>Najstaršia osoba je <?php echo "{$oldest->getSurname()}, {$oldest->getName()} ({$oldest->getYear()})" ?>.</p>
        <p>Počet mužov/žien <?php echo "{$maleFemaleCounts['m']}/{$maleFemaleCounts['f']}" ?>.</p>
        <p>Najviac osôb sa narodilo v roku <?= "{$mostCommonYear[0]} a to {$mostCommonYear[1]}" ?>.</p>
    </div>
</div>
