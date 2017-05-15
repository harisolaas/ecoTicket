<?php

session_start();

if (isset($_GET['passReset']) && isset($_GET['id'])) {
    $_SESSION['passRecoverGetCode'] = $_GET['passReset'];
    $_SESSION['userID'] = $_GET['id'];
    header('Location: helpers/passResetControllers/URLValidator.controller.php');
    exit;
} else {
    $_SESSION['errors']['URLValidationFail'] = '*La URL ingresada es incorrecta!';
    header('Location: paginas/reset-password.php');
}
