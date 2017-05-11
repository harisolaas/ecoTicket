<?php
session_start();

$titulo = 'Restablecer contraseña'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('..\elements\head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
        <link rel="stylesheet" href="../css/password-reset.css">
    </head>
    <body>
        <div class="main-container">
            <?php include('..\elements\nav.php'); ?>
            <div class="form-container">
                <?php if (!isset($_SESSION['isMailSent']) && !isset($_SESSION['URLValidationFail'])): ?>
                    <?php require '../elements/passResetMail.element.php' ?>
                <?php elseif($_SESSION['URLValidationFail']): ?>
                    <?php require '../elements/invalidURL.element.php' ?>
                <?php else: ?>
                    <?php require '../elements/passResetSuccess.php' ?>
                <?php endif; ?>

            </div>
            <div class="span"></div>
        </div>
        <?php include('..\elements\footer.php'); ?>
    </body>
</html>
