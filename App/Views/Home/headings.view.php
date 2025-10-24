<?php // headings.view.php - stránka s 10 nadpismi ?>
<?php
/** @var \Framework\Support\LinkGenerator $link */
?>
<div class="row">
    <div class="col">
        <h3>10 HTML nadpisov</h3>
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <h4><?= $i ?>. Nadpis</h4>
        <?php } ?>
    </div>
</div>

