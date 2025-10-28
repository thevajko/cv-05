<?php /** @var \App\Models\Person[] $people */ ?>
<?php
$columns = [
    'name' => 'First Name',
    'surname' => 'Last Name',
    'sex' => 'Gender',
    'year' => 'Year of Birth',
];
$sort = $sort ?? 'surname';
$dir = $dir ?? 'asc';
function sort_link($col, $label, $sort, $dir, $link) {
    $isActive = $col === $sort;
    $nextDir = ($isActive && $dir === 'asc') ? 'desc' : 'asc';
    $arrow = $isActive ? ($dir === 'asc' ? ' <span title="ascending">&#8593;</span>' : ' <span title="descending">&#8595;</span>') : '';
    $url = $link->url('person.index', ['sort' => $col, 'dir' => $nextDir]);
    return "<a href=\"$url\">$label$arrow</a>";
}
?>
<div class="container mt-5">
    <h1 class="mb-4">Persons List</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <?php foreach ($columns as $col => $label): ?>
                    <th><?= sort_link($col, $label, $sort, $dir, $link) ?></th>
                <?php endforeach; ?>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($people as $person): ?>
            <tr>
                <td><?= htmlspecialchars($person->getName()) ?></td>
                <td><?= htmlspecialchars($person->getSurname()) ?></td>
                <td><?= htmlspecialchars($person->getSex()) ?></td>
                <td><?= htmlspecialchars($person->getYear()) ?></td>
                <td><?= $person->getAge() !== null ? htmlspecialchars((string)$person->getAge()) : '–' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
