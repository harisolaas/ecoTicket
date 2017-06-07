<?php

session_start();

require '../users.library.php';

openUsers('../../');

getUserMail($_SESSION['userID'], '../../');

if
(
    $mail
    && $users[$mail]['passRecoverGetCode'] == $_SESSION['passRecoverGetCode']
    && time() < $users[$mail]['passRecoverGetCodeExpire']
)
{
    $users[$mail]['passValidation'] = true;
    $_SESSION['passValidation'] = true;
    $_SESSION['mail'] = $mail;

    unset($users[$mail]['passRecoverGetCode']);
    unset($users[$mail]['passRecoverGetCodeExpire']);
    unset($_SESSION['userID']);
    unset($_SESSION['passRecoverGetCode']);

    updateUsers('../../');

    header('Location: ../../paginas/reset-password.php');
}else {
    $_SESSION['errors']['URLValidationFail'] = '*La URL ingresada es incorrecta!';
    header('Location: ../../paginas/reset-password.php');
}
