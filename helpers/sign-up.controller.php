<?php
session_start();

// ===Here's an include with defined functions for user data editing=== //
require 'users.library.php';
require 'validation.php';



if (($errorEmail == false) && ($errorFirstName == false) && ($errorLastName == false) && ($errorPass == false)) {


    openUsers('../');

    setUserEmail($_POST['email']);
    setUserID($_POST['email'], '../');
    setUserFullName($_POST['email'], $_POST['name'], $_POST['lastName']);
    setUserPassword($_POST['email'], $_POST['pass']);
    saveImage('avatar', $users[$_POST['email']]['id']);
    updateUsers('../');

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
