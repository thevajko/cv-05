<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/styl.css">
    <script src="public/js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=$link->url("home.index")?>">
            <img src="public/images/vaiicko_logo.png" title="<?= \App\Config\Configuration::APP_NAME ?>"
                 title="<?= \App\Config\Configuration::APP_NAME ?>">
        </a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?=$link->url("home.contact")?>">Kontakt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=home&a=factorial">Faktoriál</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Osoby
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?c=person">Zoznam</a></li>
                        <li><a class="dropdown-item" href="?c=person&a=statistics">Štatistiky</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <?php if ($auth->isLogged()) { ?>
            <span class="navbar-text">Prihlásený používateľ: <b><?= $auth->getLoggedUserName() ?></b></span>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$link->url("auth.logout")?>">Odhlásenie</a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásenie</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>
