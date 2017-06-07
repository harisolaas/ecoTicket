<?php

session_start();

require_once 'class.JSONUsersRepo.php';

require_once 'class.RegisterValidator.php';

require_once 'class.PhisicalCustomer.php';

$newUserData = [
    "mail" => $_POST["mail"],
    "name" => $_POST["name"],
    "lastName" => $_POST["lastName"],
    "pass" => $_POST["pass"],
    "confirmPass" => $_POST["confirmPass"],
];

$repo = new JSONUsersRepo();

$validator = new RegisterValidator();

$validator = $validator->validate($newUserData, $repo);

if ($validator) {
    $_SESSION['errors'] = $validator;
    header('Location: ../../paginas/sign-up.php');
    exit;
}else {
    $newUser = new PhisicalCustomer($newUserData);
    $repo->saveUser($newUser);
    // header('Location: ../../paginas/sign-in.php');
    exit;
}
