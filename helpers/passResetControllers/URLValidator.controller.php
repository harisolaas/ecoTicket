<?php

session_start();

require '../users.library.php';

openUsers('../../');

getUserMail($_SESSION['userID'], '../../');

if
(
    $email
    && $users[$email]['passRecoverGetCode'] == $_SESSION['passRecoverGetCode']
    && time() < $users[$email]['passRecoverGetCodeExpire']
)
{
    $users[$email]['passValidation'] = true;
    $_SESSION['passValidation'] = true;
    $_SESSION['email'] = $email;

    unset($users[$email]['passRecoverGetCode']);
    unset($users[$email]['passRecoverGetCodeExpire']);
    unset($_SESSION['userID']);
    unset($_SESSION['passRecoverGetCode']);

    updateUsers('../../');

    header('Location: ../../paginas/reset-password.php');
}else {
    $_SESSION['errors']['URLValidationFail'] = '*La URL ingresada es incorrecta!';
    header('Location: ../../paginas/reset-password.php');
}
