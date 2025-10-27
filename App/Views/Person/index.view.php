<?php
/** @var \App\Models\Person[] $people */
?>
<div class="container py-4">
    <div class="row mb-3">
        <div class="col text-center">
            <h1>Zoznam osôb</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Meno</th>
                        <th>Priezvisko</th>
                        <th>Pohlavie</th>
                        <th>Rok narodenia</th>
                        <th>Vek</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($people as $i => $person): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= htmlspecialchars($person->getName()) ?></td>
                        <td><?= htmlspecialchars($person->getSurname()) ?></td>
                        <td><?= htmlspecialchars($person->getSex()) ?></td>
                        <td><?= htmlspecialchars($person->getYear()) ?></td>
                        <td><?= $person->getAge() !== null ? $person->getAge() : '-' ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

