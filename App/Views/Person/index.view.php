<?php /** @var \App\Models\Person[] $people */ ?>
<div class="container mt-5">
    <h1 class="mb-4">Persons List</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Year of Birth</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($people as $person): ?>
            <tr>
                <td><?= htmlspecialchars($person->getFirstName()) ?></td>
                <td><?= htmlspecialchars($person->getLastName()) ?></td>
                <td><?= htmlspecialchars($person->getGender()) ?></td>
                <td><?= htmlspecialchars($person->getYearOfBirth()) ?></td>
                <td><?= $person->getAge() !== null ? htmlspecialchars((string)$person->getAge()) : '–' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

