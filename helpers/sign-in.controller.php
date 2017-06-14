<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoTicket/support.variables.php';

require_once 'classes/repo/class.JSONUsersRepo.php';

require_once 'classes/validator/class.LogInValidator.php';

require_once 'classes/auth/class.PhCustomAuth.php';

$repo = new $dbType.UsersRepo();

$validator = new LogInValidator();

$validator = $validator->validate($_POST, $repo);

if (!$validator) {
    $auth = new PhCustomAuth();
    $auth->logIn($_POST['mail']);
    if (isset($_POST['rememberMe'])) {
        $auth->rememberMe($repo);
    }else {
        $auth->unsetRememberMe();
    }

    header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/ecoTicket');
}else {
    $_SESSION['errors'] = $validator;
    header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/ecoTicket/sign-in.php');
}
