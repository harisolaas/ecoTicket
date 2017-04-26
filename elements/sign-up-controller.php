<?php
session_start();


include 'validation.php';


if (($errorEmail == false) && ($errorFirstName == false) && ($errorLastName == false) && ($errorPass == false)) {
    $rawUserData = [];
    $rawUserData = $_POST;
    $users = file_get_contents('users.json');
    $users = json_decode($users, true);
    $users[$_POST['email']] = $rawUserData;
    $users = json_encode($users, true);
    file_put_contents('users.json', $users);

    header('Location: ../paginas/exito.php');


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
