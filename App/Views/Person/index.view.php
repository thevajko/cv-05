<?php
/** @var \App\Models\Person[] $persons */
/** @var array $years */
/** @var string $selectedYear */
/** @var string $sort */
/** @var string $dir */
/** @var \Framework\Support\LinkGenerator $link */
$persons = $persons ?? [];
$years = $years ?? [];
$selectedYear = $selectedYear ?? '';
$sort = $sort ?? '';
$dir = $dir ?? 'asc';
?>
<div class="container">
    <h2>Osoby</h2>

    <!-- Year filter buttons (server-side, using LinkGenerator) -->
    <div class="mb-3">
        <span class="me-2">Filtrovať podľa roku:</span>
        <?php
        // build base params from current GET and allow removing year explicitly
        $currentParams = $_GET ?? [];
        $allParams = $currentParams;
        unset($allParams['year']);
        $allUrl = $link->url($allParams, [], false, false);
        ?>
        <a href="<?= htmlspecialchars($allUrl) ?>" class="btn btn-sm <?= $selectedYear === '' ? 'btn-primary' : 'btn-outline-secondary' ?> me-1">Všetky</a>
        <?php foreach ($years as $yr): ?>
            <?php $active = ((string)$selectedYear === (string)$yr);
            $yrParams = $currentParams;
            $yrParams['year'] = $yr;
            $yrUrl = $link->url($yrParams, [], false, false);
            ?>
            <a href="<?= htmlspecialchars($yrUrl) ?>" class="btn btn-sm <?= $active ? 'btn-primary' : 'btn-outline-primary' ?> me-1"><?= htmlspecialchars($yr) ?></a>
        <?php endforeach; ?>
        <?php $clearUrl = $allUrl; ?>
        <a href="<?= htmlspecialchars($clearUrl) ?>" class="btn btn-sm btn-outline-danger ms-2">Zrušiť filter</a>
    </div>

    <?php if (empty($persons)): ?>
        <p>Žiadne osoby na zobrazenie.</p>
    <?php else: ?>
        <table class="table table-striped" id="persons-table">
            <thead>
            <tr>
                <th>#</th>
                <?php
                // helper for header link using LinkGenerator and preserving other params
                function header_link_gen($label, $column, $sort, $dir, $link){
                    $currentParams = $_GET ?? [];
                    $newDir = ($sort === $column && $dir === 'asc') ? 'desc' : 'asc';
                    $params = $currentParams;
                    $params['sort'] = $column;
                    $params['dir'] = $newDir;
                    $url = $link->url($params, [], false, false);
                    $arrow = '';
                    if ($sort === $column){
                        $arrow = $dir === 'asc' ? ' ▲' : ' ▼';
                    }
                    return '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($label) . $arrow . '</a>';
                }
                ?>
                <th><?= header_link_gen('Meno', 'name', $sort, $dir, $link) ?></th>
                <th><?= header_link_gen('Priezvisko', 'surname', $sort, $dir, $link) ?></th>
                <th><?= header_link_gen('Pohlavie', 'sex', $sort, $dir, $link) ?></th>
                <th><?= header_link_gen('Rok', 'year', $sort, $dir, $link) ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($persons as $i => $person): ?>
                <tr data-year="<?= htmlspecialchars($person->getYear() ?? '') ?>">
                    <td><?= htmlspecialchars($i + 1) ?></td>
                    <td><?= htmlspecialchars($person->getName() ?? '') ?></td>
                    <td><?= htmlspecialchars($person->getSurname() ?? '') ?></td>
                    <td><?= htmlspecialchars($person->getSex() ?? '') ?></td>
                    <td><?= htmlspecialchars($person->getYear() ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
