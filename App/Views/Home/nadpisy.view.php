<?php /** @var array $headings */ ?>
<h1>Zoznam nadpisov</h1>
<ul>
    <?php foreach ($headings as $nadpis): ?>
        <li><h2><?= htmlspecialchars($nadpis) ?></h2></li>
    <?php endforeach; ?>
</ul>

