<?php
session_start();

//var_dump($_POST);
include 'validation.php';
/*echo "<br>";
echo $errorFirstName;
echo "<br>";
echo $errorLastName;
echo "<br>";
echo $errorPass;
echo "<br>";
echo $errorEmail;
echo "<br>";
/*
$rawUserData = [];
$rawUserData = $_POST;
var_dump($rawUserData);
echo "<br>";
echo "<br>";
$users = file_get_contents('users.json');
var_dump($users);
echo "<br>";
echo "<br>";
$users = json_decode($users, true);
var_dump($users);
echo "<br>";
echo "<br>";
$users[$_POST['email']] = $rawUserData;
var_dump($users);
echo "<br>";
echo "<br>";
$users = json_encode($users, true);
var_dump($users);
echo "<br>";
echo "<br>";
file_put_contents('users.json', $users);*/
/*
function newUser(){
    $rawUserData = [];
    $rawUserData = $_POST;
    $users = file_get_contents('users.json');
    $users = json_decode($users, true);
    $users[$_POST['email']] = $rawUserData;
    $users = json_encode($users, true);
    file_put_contents('users.json', $users);
}*/

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

//} //else {
    // redireccion devuelta a sing up con mas todos los errores listos para poner en el formulario . inicializar $_session para que me tome las variables de los errores.
//}

 ?>
