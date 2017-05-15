<?php
session_start();

$titulo = 'Restablecer contraseña'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../elements/head.php'); ?>
        <link rel="stylesheet" href="../css/sign-in-up-forms.css">
        <link rel="stylesheet" href="../css/password-reset.css">
    </head>
    <body>
        <div class="main-container">
            <?php include('../elements/nav.php'); ?>
            <div class="form-container">
                <?php if (!isset($_SESSION['isMailSent']) && !isset($_SESSION['errors']) && !isset($_SESSION['passValidation'])): ?>
                    <?php require '../elements/passResetElements/passResetMail.element.php' ?>
                <?php elseif(@$_SESSION['errors']): ?>
                    <?php require '../elements/passResetElements/passResetError.element.php' ?>
                <?php elseif (@$_SESSION['passValidation']): ?>
                    <?php require '../elements/passResetElements/passReset.element.php' ?>
                <?php else: ?>
                    <?php require '../elements/passResetElements/passResetSuccess.element.php' ?>
                <?php endif; ?>

            </div>
            <div class="span"></div>
        </div>
        <?php include('../elements/footer.php'); ?>
    </body>
</html>
