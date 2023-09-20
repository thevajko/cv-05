<?php

/** @var Array $data */

extract($data);
?>
<div class="row">
    <div class="col">
        <h2>Štatistiky</h2>

        Najmladšia osoba je <?php echo "{$youngest->getSurname()}, {$youngest->getName()} ({$youngest->getYear()})" ?>.
        Najstašia osoba je <?php echo "{$oldest->getSurname()}, {$oldest->getName()} ({$oldest->getYear()})" ?>.

        Počet mužov/žien <?php echo "{$maleFemaleCounts['m']}/{$maleFemaleCounts['f']}" ?>.

        Najviac osôb sa narodilo v roku <?php echo "{$mostCommonYear[0]} a to {$mostCommonYear[1]}" ?>.

    </div>
</div>
