<?php

// IMPORTANT: These functions will override user data, all validations and sanitizations must be done BEFORE using them as they will save data as they receive it.

function openUsers()
{
    global $users;
    $users = file_get_contents('C:/xampp/htdocs/proyecto-integrador/json/users.json');
    $users = json_decode($users, true);
}

function updateUsers()
{
    global $users;
    $users = json_encode($users);
    file_put_contents('C:/xampp/htdocs/proyecto-integrador/json/users.json', $users);
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

function setUserID($email)
{
    global $users;
    if (!isset($users[$email]['id'])) {
        $userID = file_get_contents('userID.json');
        $userID = json_decode($userID, true);

        $id = randLetter().time();
        $userID[$id] = $email;

        $userID = json_encode($userID);
        file_put_contents('userID.json', $userID);

        $users[$email]['id'] = $id;
    }else {
        return 'Error: id already set for'.$email;
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

function isUserSet()
{
    global $users;
    return isset($users[$_POST['email']]);
}

function isPassCorrect()
{
    global $users;
    if (strlen($_POST['pass']) <= 12)
    {
        $validation = password_verify($_POST['pass'], $users[$_POST['email']]['pass']);
        return $validation;
    } else {
        $validation = ($_POST['pass'] == $users[$_POST['email']]['pass']);
        return $validation;
    }
}

function logIn()
{
    // Set session timeout
    $_SESSION['logIn'] = true;
}

function unsetRememberMe()
{
    // Expire cookie
    $cookieDuration = time() - 60*60*24*15;
    $cookieDir = '/';
    setcookie('fakePass', '', $cookieDuration, $cookieDir);
    setcookie('pass', '', $cookieDuration, $cookieDir);
    setcookie('email', '', $cookieDuration, $cookieDir);
}

function getUserMail($userID)
{
    global $email;
    $IDusers = file_get_contents('C:/xampp/htdocs/proyecto-integrador/json/userID.json');
    $IDusers = json_decode($IDusers, true);
    if (isset($IDusers[$userID])) {
        $email = $IDusers[$userID];
        return $email;
    } else {
        $email = false;
        return false;
    }
}

function randLetter()
{
    $a = ['a','b','c','d','e','f','g', 'h', 'i', 'j', 'k', 'l','m','n','o', 'p','q','r','s','t','u','v', 'w'];
    return $a[rand(0, count($a))];
}

 ?>
