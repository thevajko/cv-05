<?php
/**
 * @var \App\Models\Osoba[] $osoby
 */

?>
<div class="row">
    <div class="col">
        <h3>Zoznam osôb</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Pohlavie</th>
                    <th>Rok narodenia</th>
                    <th>Vek</th>
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

