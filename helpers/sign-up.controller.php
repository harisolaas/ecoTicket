<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoTicket/support.variables.php';

require_once 'classes/repo/class.JSONUsersRepo.php';

require_once 'classes/validator/class.RegisterValidator.php';

require_once 'classes/user/class.PhisicalCustomer.php';


$usersRepo = $dbType.'UsersRepo';

$repo = new $usersRepo();

if (isset($_GET['mail'])) {
    if($repo->getUserByMail($_GET['mail'])){
        $res = true;
    }else {
        $res = false;
    }
    $res = json_encode($res);
    print $res;
    die();
}

$validator = new RegisterValidator();

$validator = $validator->validate($_POST, $repo);

header('Content-Type: application/json');

if ($validator) {
    header('HTTP/1.0 422 Unprocessable entity.');
}else {
    $newUser = new PhisicalCustomer($_POST);
    $repo->saveUser($newUser);
}
print json_encode($validator);
