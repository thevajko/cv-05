<?php
/** @var array $nadpisy */
?>
<div class="container py-4">
    <div class="row mb-3">
        <div class="col text-center">
            <h1>Zoznam nadpisov</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php foreach ($nadpisy as $i => $nadpis): ?>
                <h2 class="my-3"><?= ($i+1) ?>. <?= htmlspecialchars($nadpis) ?></h2>
            <?php endforeach; ?>
        </div>
    </div>
</div>
