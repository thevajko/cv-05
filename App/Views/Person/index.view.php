<?php
use App\Models\Person;

/** @var Array $data */
/** @var Person[] $persons */
/** @var \App\Core\Request $request */
/** @var \App\Core\LinkGenerator $link */

$persons = $data['persons'];

?>
<div class="row">
    <div class="col">
        <table>
            <tr>
                <th><a href="<?= $link->url(["sort" => "lastname"], appendParameters:true) ?>">Priezvisko</a></th>
                <th><a href="<?= $link->url(["sort" => "name"], appendParameters:true) ?>">Meno</a></th>
                <th><a href="<?= $link->url(["sort" => "year"], appendParameters:true) ?>">Rok narodenia</a></th>
                <th><a href="<?= $link->url(["sort" => "year"], appendParameters:true) ?>">Vek</a></th>
                <th><a href="<?= $link->url(["sort" => "sex"], appendParameters:true) ?>">Pohlavie</a></th>
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
            <a href="<?= $link->url(["year" => null], appendParameters:true) ?>" class="btn btn-primary">Všetky roky</a>
            <?php foreach ($data['yearsArray'] as $year) { ?>
                <a href="<?= $link->url(["year" =>  $year], appendParameters:true) ?>" class="btn btn-primary"><?php echo $year?></a>
            <?php } ?>
        </div>
    </div>
</div>
