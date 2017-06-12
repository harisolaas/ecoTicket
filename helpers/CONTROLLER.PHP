<?php

session_start();

$repo = new JSONUsersRepo();

$validator = new LogInValidator();

$validator = $validator->validate($_POST, $repo);

if (!$validator) {
    $auth = new PhCustomAuth();
    $auth->logIn($_POST['mail']);
    if ($_POST['rememberMe']) {
        $auth->rememberMe($repo);
    }else {
        $auth->unsetRememberMe();
    }

header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/ecoTicket');
}else {

}
