<?php
require_once "controllers/calendar_controller.php";
include('inc/header.php');
?>

<h1 class="text-center">Calendrier LHP8</h1>
<h2 class="text-center"><a class="btn" href=""><i class="bi bi-arrow-left-circle"></i></a><?= $year ?><a class="btn" href=""><i class="bi bi-arrow-right-circle"></i></a></h2>
<h2 class="text-center"><a class="btn" href=""><i class="bi bi-arrow-left-circle"></i></a><?= $monthLetters ?><a class="btn" href=""><i class="bi bi-arrow-right-circle"></i></a></h2>

<div class="row justify-content-center p-0 mt-5 mx-0">
    <div class="col-10 calendar p-0 m-0">

        <!-- Nous réalisons une boucle pour afficher les jours de la semaine -->
        <?php
        foreach ($days as $key => $value) { ?>
            <div class="text-center text-light bg-dark"><?= $value ?></div>
        <?php }

        for ($i = 1; $i <= $lines; $i++) { ?>
            <div class="text-center">
                
                    <?= $i ?>
              
            </div>
        <?php }




        ?>



    </div>

</div>
<?php
include('inc/footer.php');
