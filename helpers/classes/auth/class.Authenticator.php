<?php

/**
 *
 */
abstract class Authenticator
{
    public function logIn($user){};
    public function rememberMe(){};

    public function logOut()
    {
        $_SESSION['logIn'] = false;
        $_SESSION['userInfo'] = null;
        $_SESSION['userType'] = null;
    }

    public function logInSuccess()
    {
        $_SESSION['logIn'] = true;
        $_SESSION['userInfo'] = $user;
        header('Location:');
        break;
    }

    public function logInFailure()
    {
        $_SESSION['logIn'] = false;
        header('Location:');
        break;
    }
}
