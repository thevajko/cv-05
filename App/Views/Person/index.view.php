<?php
use App\Models\Person;

/** @var Array $data */
/** @var Person[] $persons */
/** @var \App\Core\LinkGenerator $link */

$persons = $data['persons'];

?>
<div class="row">
    <div class="col">
        <table class="table table-striped">
            <tr>
                <th>Priezvisko</th>
                <th>Meno</th>
                <th>Rok narodenia</th>
                <th>Vek</th>
                <th>Pohlavie</th>
            </tr>
            <?php foreach ($persons as $person) { ?>
                <tr>
                    <td><?= $person->getSurname() ?></td>
                    <td><?= $person->getName() ?></td>
                    <td><?= $person->getYear() ?></td>
                    <td><?= date("Y") - $person->getYear() ?></td>
                    <td><?= $person->getSex() == "f" ? "žena" : "muž" ?></td>
                </tr>
            <?php } ?>
        </table>

    </div>
</div>