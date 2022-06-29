<?php
require_once "controllers/calendar_controller.php";
include('inc/header.php');
?>

<h1 class="text-center">Calendrier LHP8</h1>
<h2 class="text-center"><a class="btn" href="index.php?<?= isset($_GET['month']) ? 'month=' . $_GET['month'] . '&' : '' ?>year=<?= $year-1 ?>"><i class="bi bi-arrow-left-circle"></i></a><?= $year ?><a class="btn" href="index.php?<?= isset($_GET['month']) ? 'month=' . $_GET['month'] . '&' : '' ?>year=<?= $year+1 ?>"><i class="bi bi-arrow-right-circle"></i></a></h2>
<h2 class="text-center"><a class="btn" href="index.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 1 ? 12 : $monthNumber - 1?>"><i class="bi bi-arrow-left-circle"></i></a><?= $monthLetters ?><a class="btn" href="index.php?<?= isset($_GET['year']) ? 'year=' . $_GET['year'] . '&' : '' ?>month=<?= $monthNumber == 12 ? 1 : $monthNumber + 1?>"><i class="bi bi-arrow-right-circle"></i></a></h2>

<div class="row justify-content-center p-0 mt-5 mx-0">
    <div class="col-10 calendar p-0 m-0">
        <?php
        foreach ($days as $key => $value) { ?>
            <div class="text-center text-light bg-dark"><?= $value ?></div>
        <?php }
        for ($i = 1; $i <= $lines; $i++) { ?>
            <?= createCase($firstCaseTimestamp,$i,$monthNumber,$arraySpecialDays) ?>
        <?php }
        ?>
    </div>
</div>
<?php
include('inc/footer.php');
