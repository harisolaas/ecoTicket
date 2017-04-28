<?php
session_start();


include 'validation.php';


if (($errorEmail == false) && ($errorFirstName == false) && ($errorLastName == false) && ($errorPass == false)) {

    $rawUserData = [];
    $rawUserData['firstName'] = $_POST['first-name'];
    $rawUserData['lastName'] = $_POST['last-name'];
    $rawUserData['pass'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $users = file_get_contents('users.json');
    $users = json_decode($users, true);
    // Chequear si el mail ya esta en base de datos para que no reescriba el indice con los usuarios.
    $users[$_POST['email']] = $rawUserData;
    $users = json_encode($users);
    file_put_contents('users.json', $users);
var_dump($users);
    //header('Location: ../paginas/exito.php');


} else {

    $_SESSION['errorFirstName'] = $errorFirstName;
    $_SESSION['errorLastName'] = $errorLastName;
    $_SESSION['errorEmail'] = $errorEmail;
    $_SESSION['errorPass'] = $errorPass;

    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['email'] = $email;


    header('Location: ../paginas/sign-up.php');



}


 ?>
