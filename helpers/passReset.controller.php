<?php

session_start();

include 'users.library.php';

function generateUniqueURL()
{
    global $users;
    global $passRecoverGetCode;
    $id = $users[$_POST['email']]['id'];
    $passRecoverGetCode = uniqid();
    $passRecoverGetCode = password_hash($passRecoverGetCode, PASSWORD_BCRYPT);
    return "localhost/proyecto-integrador/paginas/password-reset.php?passReset=".$passRecoverGetCode."&id=".$id;
}

openUsers();

if (!isUserSet()) {
    $_SESSION['errors']['errorEmail'] = '*La dirección de correo ingresada no figura en nuestra base de datos!';
    $_SESSION['email'] = $_POST['email'];
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
