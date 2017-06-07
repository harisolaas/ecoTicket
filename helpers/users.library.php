<?php

// IMPORTANT: These functions will override user data, all validations and sanitizations must be done BEFORE using them as they will save data as they receive it.

function openUsers($root)
{
    global $users;
    $users = file_get_contents($root.'json/users.json');
    $users = json_decode($users, true);
}

function updateUsers($root)
{
    global $users;
    $users = json_encode($users);
    file_put_contents($root.'json/users.json', $users);
}

function setUsermail($newmail, $mail = '')
{
    global $users;
    if (!isset($users[$mail]))
    {
        $users[$newmail] = [];
    }
    else
    {
        $users[$newmail] = $users[$mail];
        unset($users[$mail]);
    }
}

function setUserID($mail, $root)
{
    global $users;
    if (!isset($users[$mail]['id'])) {
        $userID = file_get_contents($root.'json/userID.json');
        $userID = json_decode($userID, true);

        $id = randLetter().time();
        $userID[$id] = $mail;

        $userID = json_encode($userID);
        file_put_contents($root.'json/userID.json', $userID);

        $users[$mail]['id'] = $id;
    }else {
        return 'Error: id already set for'.$mail;
    }
}

function setUserFullName($mail, $name, $lastName)
{
    global $users;
    $users[$mail]['name'] = $name;
    $users[$mail]['lastName'] = $lastName;
}

function setUserPassword($mail, $pass)
{
    global $users;
    $users[$mail]['pass'] = password_hash($pass, PASSWORD_BCRYPT);
}

function deleteUser($mail)
{
    global $users;
    unset($users[$mail]);
}

function isUserSet()
{
    global $users;
    return isset($users[$_POST['mail']]);
}

function isPassCorrect()
{
    global $users;
    if (strlen($_POST['pass']) <= 12)
    {
        $validation = password_verify($_POST['pass'], $users[$_POST['mail']]['pass']);
        return $validation;
    } else {
        $validation = ($_POST['pass'] == $users[$_POST['mail']]['pass']);
        return $validation;
    }
}

function logIn()
{
    global $users;
    $mail = $_POST['mail'];
    // Set session timeout
    $_SESSION['logIn'] = true;
    $_SESSION['mail'] = $mail;
    $_SESSION['name'] = $users[$mail]['name'];
    $_SESSION['lastName'] = $users[$mail]['lastName'];
    $_SESSION['userID'] = $users[$mail]['id'];
    $_SESSION['avatar'] = $users[$mail]['avatar'];
}

function unsetRememberMe()
{
    // Expire cookie
    $cookieDuration = time() - 60*60*24*15;
    $cookieDir = '/';
    setcookie('fakePass', '', $cookieDuration, $cookieDir);
    setcookie('pass', '', $cookieDuration, $cookieDir);
    setcookie('mail', '', $cookieDuration, $cookieDir);
}

function getUserMail($userID, $root)
{
    global $mail;
    $IDusers = file_get_contents($root.'json/userID.json');
    $IDusers = json_decode($IDusers, true);
    if (isset($IDusers[$userID])) {
        $mail = $IDusers[$userID];
        return $mail;
    } else {
        $mail = false;
        return false;
    }
}

function randLetter()
{
    $a = ['a','b','c','d','e','f','g', 'h', 'i', 'j', 'k', 'l','m','n','o', 'p','q','r','s','t','u','v', 'w'];
    return $a[rand(0, count($a))];
}

 ?>
