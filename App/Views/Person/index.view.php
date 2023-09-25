<?php
use App\Models\Person;

/** @var Array $data */
/** @var Person[] $persons */
/** @var \App\Core\Request $request */

$request = $data['request'];
$persons = $data['persons'];

// this is url for table ordering that saves year filtering settings
$urlStart = "?c=person";
$urlWithYearFilter = $urlStart. "&year={$request->getValue('year')}&sort=";
// this is url addon for year filter that saves table order settings
$urlWithTableOrder = $urlStart."&sort={$request->getValue('sort')}&order={$request->getValue('order')}";

$sortingOrder = $data['sortingOrder'];
$yearsArray = $data['yearsArray'];
?>
<div class="row">
    <div class="col">
        <table>
            <tr>
                <th><a href="<?php echo "{$urlWithYearFilter}surname&order={$sortingOrder}" ?>">Priezvisko</a></th>
                <th><a href="<?php echo "{$urlWithYearFilter}name&order={$sortingOrder}" ?>">Meno</a></th>
                <th><a href="<?php echo "{$urlWithYearFilter}year&order={$sortingOrder}" ?>">Rok narodenia</a></th>
                <th><a href="<?php echo "{$urlWithYearFilter}year&order={$sortingOrder}" ?>">Vek</a></th>
                <th><a href="<?php echo "{$urlWithYearFilter}sex&order={$sortingOrder}" ?>">Pohlavie</a></th>
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
            <a href="<?php echo $urlWithTableOrder."&year=" ?>" class="btn btn-primary">Všetky roky</a>
            <?php foreach ($yearsArray as $year) { ?>
                <a href="<?php echo $urlWithTableOrder."&year=".$year ?>" class="btn btn-primary"><?php echo $year?></a>
            <?php } ?>
        </div>
    </div>
</div>
