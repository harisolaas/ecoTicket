<?php

session_start();

// require_once '';

require_once 'classes/repo/class.JSONUsersRepo.php';

require_once 'classes/validator/class.RegisterValidator.php';

require_once 'classes/user/class.PhisicalCustomer.php';

$repo = new JSONUsersRepo();

$validator = new RegisterValidator();

$validator = $validator->validate($_POST, $repo);

if ($validator) {
    $_SESSION['errors'] = $validator;
    header('Location: '.$_SERVER['ROOT_DIRECTORY'].'/ecoTicket/paginas/sign-up.php');
    exit;
}else {
    $newUser = new PhisicalCustomer($_POST);
    $repo->saveUser($newUser);
    header('Location: '.$_SERVER['ROOT_DIRECTORY'].'/ecoTicket/paginas/sign-in.php');
    exit;
}
