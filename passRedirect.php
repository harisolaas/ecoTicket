<?php

session_start();

if (isset($_GET['passReset']) && isset($_GET['id'])) {
    $_SESSION['passRecoverGetCode'] = $_GET['passReset'];
    $_SESSION['userID'] = $_GET['id'];
    header('Location: helpers/URLValidator.controller.php');
    exit;
} else {
    $_SESSION['URLValidationFail'] = true;
    header('Location: paginas/reset-password.php');
}
