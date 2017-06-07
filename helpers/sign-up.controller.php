<?php
session_start();

// ===Here's an include with defined functions for user data editing=== //
require 'users.library.php';
require 'validation.php';



if (($errormail == false) && ($errorFirstName == false) && ($errorLastName == false) && ($errorPass == false)) {


    openUsers('../');

    setUsermail($_POST['mail']);
    setUserID($_POST['mail'], '../');
    setUserFullName($_POST['mail'], $_POST['name'], $_POST['lastName']);
    setUserPassword($_POST['mail'], $_POST['pass']);
    saveImage('avatar', $users[$_POST['mail']]['id']);
    updateUsers('../');

    header('Location: ../paginas/exito.php');


} else {

    $_SESSION['errorFirstName'] = $errorFirstName;
    $_SESSION['errorLastName'] = $errorLastName;
    $_SESSION['errormail'] = $errormail;
    $_SESSION['errorPass'] = $errorPass;

    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['mail'] = $mail;


    header('Location: ../paginas/sign-up.php');



}


 ?>
