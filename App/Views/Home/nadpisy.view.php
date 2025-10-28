<?php /** @var array $headings */ ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Zoznam nadpisov</h1>
            <ul class="list-group">
                <?php foreach ($headings as $nadpis): ?>
                    <li class="list-group-item">
                        <h2 class="h5 mb-0"><?= htmlspecialchars($nadpis) ?></h2>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
