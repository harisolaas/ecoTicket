<?php
session_start();

$titulo = 'Éxito';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../elements/head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
        <link rel="stylesheet" href="../css/success.css">
    </head>
    <body>
        <div class="container">
            <?php include('../elements/nav.php'); ?>

            <div class="box-container">
                <h1 class="element">Éxito!</h1>
                <p class="element">La registración fuexitosa!</p>
            </div>

            <div class="span"></div>
        </div>
        <?php include('../elements/footer.php'); ?>
    </body>
</html>
