<?php
session_start();


include '..\helpers\validation.php';
// ===Here's an include with defined functions for user data editing=== //
include '..\helpers\users.library.php';


if (($errorEmail == false) && ($errorFirstName == false) && ($errorLastName == false) && ($errorPass == false)) {

        // $rawUserData = [];
        // $rawUserData['firstName'] = $_POST['first-name'];
        // $rawUserData['lastName'] = $_POST['last-name'];
        // $rawUserData['pass'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);

        // $users = file_get_contents('users.json');
        // $users = json_decode($users, true);
    openUsers();

    // Chequear si el mail ya esta en base de datos para que no reescriba el indice con los usuarios.

    setUserEmail($_POST['email']);
    setUserFullName($_POST['email'], $_POST['name'], $_POST['lastName']);
    setUserPassword($_POST['email'], $_POST['pass']);

    updateUsers();
        // $users[$_POST['email']] = $rawUserData;
        // $users = json_encode($users);
        // file_put_contents('users.json', $users);
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
