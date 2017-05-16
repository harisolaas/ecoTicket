<?php

session_start();

require '../users.library.php';

function passValidation()
{
    global $errors;
    // VALIDACION PASSWORD vs CONFIRM_PASSWORD
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirm-pass'];

        if($_POST['pass'] !== $_POST['confirm-pass']){
            $errors['passConfirmationFail'] = 'Los Passwords no coinciden';


    // VALIDACION LONGITUD DEL PASSWORD
        } elseif(strlen($_POST['pass']) < 6){
            $errors['passToShort'] = 'Debes ingresar un Passsword de al menos 6 caracteres';
        }  elseif (strlen($_POST['pass']) >= 12) {
            $errors['passToLong'] = 'Debes ingresar un Password de hasta 12 caracteres';
        }

        //VALIDACION PASSWORD EXITOSA

        else {
            $errors = true;
        }
    return $errors;
}

openUsers('../../');

if (isset($_POST['pass']) && $_POST['confirm-pass']) {
    if (@$_SESSION['passValidation'] && $users[$_SESSION['email']]['passValidation']) {

        if (passValidation() === true) {
            setUserPassword($_SESSION['email'], $_POST['pass']);
            unset($_SESSION['passValidation']);
            unset($users[$_SESSION['email']]['passValidation']);
            updateUsers('../../');
            header('Location: ../../paginas/sign-in.php');
            exit;
        }else {
            $_SESSION['errors'] = $errors;
            header('Location: ../../paginas/reset-password.php');
            exit;
        }

    }else {
        $_SESSION['errors']['passValidation'] = 'Hubo un error al intentar modificar tu contraseña. Por motivos de seguridad tu cuenta fue bloqueda, para recuperar el acceso volvé a Recuperar Contraseña:';
        unset($_SESSION['passValidation']);
        unset($users[$_SESSION['email']]['passValidation']);
        // header('Location: ../../paginas/reset-password.php');
        exit;
    }
}
