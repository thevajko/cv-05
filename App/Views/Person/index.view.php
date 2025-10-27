<?php
/** @var \App\Models\Person[] $people */
/** @var string $sort */
/** @var int $asc */
/** @var \Framework\Support\LinkGenerator $link */
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
                        <?php
                        // Helper na generovanie odkazov na zoradenie
                        function sort_link($label, $column, $sort, $asc, $link) {
                            $nextAsc = ($sort === $column && $asc == 1) ? 0 : 1;
                            $icon = '';
                            if ($sort === $column) {
                                $icon = $asc == 1 ? '▲' : '▼';
                            }
                            $url = $link->url('person.index', ['sort' => $column, 'asc' => $nextAsc]);
                            return '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($label) . ' ' . $icon . '</a>';
                        }
                        ?>
                        <th><?= sort_link('Meno', 'name', $sort, $asc, $link) ?></th>
                        <th><?= sort_link('Priezvisko', 'surname', $sort, $asc, $link) ?></th>
                        <th><?= sort_link('Pohlavie', 'sex', $sort, $asc, $link) ?></th>
                        <th><?= sort_link('Rok narodenia', 'year', $sort, $asc, $link) ?></th>
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
