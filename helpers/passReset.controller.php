<?php

session_start();

include 'users.library.php';

function generateUniqueURL()
{
    global $passRecoverGetCode;
    $passRecoverGetCode = uniqid();
    $passRecoverGetCode = password_hash($url, PASSWORD_BCRYPT);
    return "localhost/proyecto-integrador/paginas/passReset/?passReset=".$passRecoverGetCode;
}

openUsers();

if (!isUserSet()) {
    $_SESSION['errors']['errorEmail'] = '*La dirección de correo ingresada no figura en nuestra base de datos!';
    header('Location: ../paginas/reset-password.php');
    exit;
} else {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['passRecoverURL'] = generateUniqueURL();

    $users[$_POST['email']]['passRecoverGetCode'] = $passRecoverGetCode;
    $users[$_POST['email']]['passRecoverGetCodeExpire'] = time() + 60*60*24;
    updateUsers();

    header('Location: PHPMailer-master/examples/gmail.php');
    exit;
}
