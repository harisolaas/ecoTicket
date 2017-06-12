<?php

/**
 *
 */
abstract class Authenticator
{
    public function logOut()
    {
        $_SESSION['loggedUser'] = null;
        $_SESSION['userType'] = null;
    }

    public function logIn($userMail)
    {
        $_SESSION['loggedUser'] = $userMail;
    }

    public function rememberMe(UsersRepo $repo)
    {
        if (strlen($_POST['pass'])<=12) {

            $user = $_POST['mail'];
            $pass = $_POST['pass'];
            $passLength = strlen($_POST['pass']);
            $fakePass = '';
            for ($i=0; $i < $passLength ; $i++) {
                $fakePass = $fakePass."x";
            }
            $pass = $repo->getUserField($user, 'pass');
            $cookieDuration = time() + 60*60*24*15;
            $cookieDir = '/';
            setcookie('fakePass', $fakePass, $cookieDuration, $cookieDir);
            setcookie('pass', $pass, $cookieDuration, $cookieDir);
            setcookie('mail', $user, $cookieDuration, $cookieDir);
        }
    }

    public function unsetRememberMe()
    {
        {
            // Expire cookie
            $cookieDuration = time() - 60*60*24*15;
            $cookieDir = '/';
            setcookie('fakePass', '', $cookieDuration, $cookieDir);
            setcookie('pass', '', $cookieDuration, $cookieDir);
            setcookie('mail', '', $cookieDuration, $cookieDir);
        }
    }
}
