<?php
/** @var Array $data */
?>
<div class="row">
    <div class="col">
        <?php for ($i = 0; $i < $data['count']; $i++) { ?>
            <h1>Toto je nadpis č.<?= $i+1 ?></h1>
        <?php } ?>
    </div>
</div>