<?php

use Framework\Support\View;
use Framework\Http\HttpException;

/** @var $exception */
/** @var bool $showDetail */
/** @var View $view */

$view->layout(null);
?>

<h1><?= $exception->getCode() . " - " . $exception->getMessage() ?></h1>

<?php
if ($showDetail && $exception->getCode() != 500) :
    ?>
    <?= get_class($exception) ?>: <strong><?= $exception->getMessage() ?></strong>
    in file <strong><?= $exception->getFile() ?></strong>
    at line <strong><?= $exception->getLine() ?></strong>
    <pre>Stack trace:<br><?= $exception->getTraceAsString() ?></pre>
<?php endif; ?>

<?php
while ($showDetail && $exception->getPrevious() != null) { ?>
    <?= get_class($exception->getPrevious()) ?>: <strong><?= $exception->getPrevious()->getMessage() ?></strong>
    in file <strong><?= $exception->getPrevious()->getFile() ?></strong>
    at line <strong><?= $exception->getPrevious()->getLine() ?></strong>
    <pre>Stack trace:<br><?= $exception->getPrevious()->getTraceAsString() ?></pre>
    <?php $exception = $exception->getPrevious(); ?>
<?php } ?>
