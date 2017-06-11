<?php

/**
 *
 */
abstract class Authenticator
{
    public function rememberMe(){};

    public function logOut()
    {
        $_SESSION['loggedUser'] = null;
        $_SESSION['userType'] = null;
    }

    public function logIn($userMail)
    {
        $_SESSION['loggedUser'] = $userMail;
    }
}
