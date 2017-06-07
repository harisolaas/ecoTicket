<?php

session_start();

$newUserData = [
    "mail" => $_POST["mail"],
    "name" => $_POST["name"],
    "lastName" => $_POST["lastName"],
    "pass" => $_POST["pass"],
    "confirmPass" => $_POST["confirmPass"],
];

$repo = new JSONRepo();

$validator = new RegisterValidator();

$validator = $validator->validate($newUserData);

if ($validator) {
    $_SESSION['errors'] = $validator;
    header('Location: ../../paginas/sign-up.php');
    break;
}else {
    $newUser = new PhisicalCustomer($newUserData);
    $newUser->save();
    header('Location: ../../paginas/sign-in.php');
}
