<?php
/** @var int $count */
$count = $count ?? 10;
?>
<div class="container">
    <h2>Nadpisy</h2>
    <?php for ($i = 1; $i <= $count; $i++): ?>
        <h3 class="mt-2">Nadpis <?php echo htmlspecialchars($i); ?></h3>
    <?php endfor; ?>
</div>

