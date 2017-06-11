<?php

session_start();

$repo = new JSONUsersRepo();

$validator = new LogInValidator();

$validator = $validator->validate($_POST, $repo);

if ($validator) {
    $auth = new PhCustomAuth();
}
