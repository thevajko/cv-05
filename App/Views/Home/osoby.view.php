<?php
/**
 * @var \App\Models\Osoba[] $osoby
 * @var string $sortBy
 * @var string $sortDir
 */

?>
<div class="row">
    <div class="col">
        <h3>Zoznam osôb (zoradené podľa <?= htmlspecialchars($sortBy) ?> <?= $sortDir === 'desc' ? '↓' : '↑' ?>)</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><a href="?c=home&a=osoby&sortBy=meno&sortDir=<?= $sortBy === 'meno' && $sortDir === 'asc' ? 'desc' : 'asc' ?>">Meno<?= $sortBy === 'meno' ? ($sortDir === 'asc' ? ' ↑' : ' ↓') : '' ?></a></th>
                    <th><a href="?c=home&a=osoby&sortBy=priezvisko&sortDir=<?= $sortBy === 'priezvisko' && $sortDir === 'asc' ? 'desc' : 'asc' ?>">Priezvisko<?= $sortBy === 'priezvisko' ? ($sortDir === 'asc' ? ' ↑' : ' ↓') : '' ?></a></th>
                    <th><a href="?c=home&a=osoby&sortBy=pohlavie&sortDir=<?= $sortBy === 'pohlavie' && $sortDir === 'asc' ? 'desc' : 'asc' ?>">Pohlavie<?= $sortBy === 'pohlavie' ? ($sortDir === 'asc' ? ' ↑' : ' ↓') : '' ?></a></th>
                    <th><a href="?c=home&a=osoby&sortBy=rokNarodenia&sortDir=<?= $sortBy === 'rokNarodenia' && $sortDir === 'asc' ? 'desc' : 'asc' ?>">Rok narodenia<?= $sortBy === 'rokNarodenia' ? ($sortDir === 'asc' ? ' ↑' : ' ↓') : '' ?></a></th>
                    <th><a href="?c=home&a=osoby&sortBy=vek&sortDir=<?= $sortBy === 'vek' && $sortDir === 'asc' ? 'desc' : 'asc' ?>">Vek<?= $sortBy === 'vek' ? ($sortDir === 'asc' ? ' ↑' : ' ↓') : '' ?></a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($osoby as $osoba): ?>
                <tr>
                    <td><?= htmlspecialchars($osoba->getMeno()) ?></td>
                    <td><?= htmlspecialchars($osoba->getPriezvisko()) ?></td>
                    <td><?= htmlspecialchars($osoba->getPohlavie()) ?></td>
                    <td><?= htmlspecialchars($osoba->getRokNarodenia()) ?></td>
                    <td><?= htmlspecialchars($osoba->getVek()) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
