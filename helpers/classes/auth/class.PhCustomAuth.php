<?php

require_once 'class.Authenticator.php';

/**
 *
 */
class PhCustomAuth extends Authenticator
{
    public function logIn($userMail)
    {
        $_SESSION['userType'] = 'PhisicalCustomer';
        parent::logIn($userMail);
    }

    public function rememberMe()
    {
        if (strlen($_POST['pass'])<=12) {
            global $users;

            $user = $_POST['mail'];
            $pass = $_POST['pass'];
            $passLength = strlen($_POST['pass']);
            $fakePass = '';
            for ($i=0; $i < $passLength ; $i++) {
                $fakePass = $fakePass."x";
            }
            $pass = $users[$user]['pass'];
            $cookieDuration = time() + 60*60*24*15;
            $cookieDir = '/';
            setcookie('fakePass', $fakePass, $cookieDuration, $cookieDir);
            setcookie('pass', $pass, $cookieDuration, $cookieDir);
            setcookie('mail', $user, $cookieDuration, $cookieDir);
        }
    }

}
