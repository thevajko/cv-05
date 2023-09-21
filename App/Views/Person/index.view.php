<?php
use App\Models\Person;

/** @var Array $data */
/** @var Person[] $persons */
/** @var \App\Core\Request $request */

$request = $data['request'];
$persons = $data['persons'];
$urlStart = "?c=person&year={$request->getValue('year')}&sort=";
$sortingOrder = $data['sortingOrder'];
$yearsArray = "&order=".$request->getValue('order').$data['yearsArray'];

$sortUrl = $urlStart.$request->getValue('sort');

?>
<div class="row">
    <div class="col">
        <table>
            <tr>
                <th><a href="<?php echo "{$urlStart}surname&order={$sortingOrder}" ?>">Priezvisko</a></th>
                <th><a href="<?php echo "{$urlStart}name&order={$sortingOrder}" ?>">Meno</a></th>
                <th><a href="<?php echo "{$urlStart}year&order={$sortingOrder}" ?>">Rok narodenia</a></th>
                <th><a href="<?php echo "{$urlStart}year&order={$sortingOrder}" ?>">Vek</a></th>
                <th><a href="<?php echo "{$urlStart}sex&order={$sortingOrder}" ?>">Pohlavie</a></th>
            </tr>
            <?php foreach ($persons as $person) { ?>
                <tr>
                    <td><?php echo $person->getSurname() ?></td>
                    <td><?php echo $person->getName() ?></td>
                    <td><?php echo $person->getYear() ?></td>
                    <td><?php echo date("Y") - $person->getYear() ?></td>
                    <td><?php echo $person->getSex() == "f" ? "žena" : "muž" ?></td>
                </tr>
            <?php } ?>
        </table>
        <div class="d-flex gap-1">
            <a href="<?php echo $sortUrl."&year=" ?>" class="btn btn-primary">Všetky roky</a>
            <?php foreach ($yearsArray as $year) { ?>
                <a href="<?php echo $sortUrl."&year=".$year ?>" class="btn btn-primary"><?php echo $year?></a>
            <?php } ?>
        </div>
    </div>
</div>
