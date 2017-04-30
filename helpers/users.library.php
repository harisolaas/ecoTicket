<?php

// IMPORTANT: These functions will override user data, all validations and sanitizations must be done BEFORE using them as they will save data as they receive it.

function openUsers()
{
    global $users;
    $users = file_get_contents('C:\xampp\htdocs\proyecto-integrador\json\users.json');
    $users = json_decode($users, true);
}

function updateUsers()
{
    global $users;
    $users = json_encode($users);
    file_put_contents('C:\xampp\htdocs\proyecto-integrador\json\users.json', $users);
}

function setUserEmail($newEmail, $email = '')
{
    global $users;
    if (!isset($users[$email]))
    {
        $users[$newEmail] = [];
    }
    else
    {
        $users[$newEmail] = $users[$email];
        unset($users[$email]);
    }
}

function setUserFullName($email, $name, $lastName)
{
    global $users;
    $users[$email]['name'] = $name;
    $users[$email]['lastName'] = $lastName;
}

function setUserPassword($email, $pass)
{
    global $users;
    $users[$email]['pass'] = password_hash($pass, PASSWORD_BCRYPT);
}

function deleteUser($email)
{
    global $users;
    unset($users[$email]);
}

 ?>
