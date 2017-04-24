<?php


$errorFirstName = '';
$errorLastName= '';
$errorPass = '';
$errorEmail= '';


/*$resultado = preg_replace("/[^a-z0-9 ná-ú]+/", "", $nombre);*/




        // VALIDACION NAME < 30 caracteres
$firstName = trim($_POST["first-name"]);
// NECESITO AVERIGUAR COMO APLICAR EN FILTER_SANITIZE_STRING
$firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
if(strlen($firstName) > 30){
    $errorFirstName = 'El nombre es demasiado largo';
}
// VALIDACION LAST NAME
$lastName = trim($_POST["last-name"]);
// NECESITO AVERIGUAR COMO APLICAR EN FILTER_SANITIZE_STRING
$lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
if(strlen($lastName) > 30){
    $errorLastName = 'El apellido es demasiado largo';
}
        // VALIDACION PASSWORD vs CONFIRM_PASSWORD
        $pass = $_POST['pass'];
        $confirmPass = $_POST['confirm-pass'];
if(isset($_POST['pass']) && isset($_POST['confirm-pass'])){
    if($_POST['pass'] !== $_POST['confirm-pass']){
        $errorPass = 'Los Passwords no coinciden';

        // VALIDACION LONGITUD DEL PASSWORD + de 6 caracteres
    } elseif(strlen($_POST['pass']) < 6){
        $errorPass = 'Debes ingresar un Passsword de al menos 6 caracteres';
    }  elseif (strlen($_POST['pass']) >= 12) {
        $errorPass = 'Debes ingresar un Password de 12 o menos caracteres';
    }

    //VALIDACION PASSWORD EXITOSA

    else {
        $errorPass = '';
    }
}

    //VALIDACION EMAIL
    $email = trim($_POST['email']);
    $validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($validateEmail === false){
        $errorEmail = 'Por favor ingresar un Email valido';
    } else { $errorEmail = '';
    }

 ?>
