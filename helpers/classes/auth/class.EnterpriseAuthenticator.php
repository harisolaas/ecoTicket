<?php

session_start();

require_once 'class.Authenticator.php';

/**
 *
 */
class EnterpriseAuthenticator extends Authenticator
{
    public function logIn($user)
    {
        if ($user) {
            $_SESSION['userType'] = 'Enterprise';
            parent::logInSuccess();
        }else {
            parent::logInFailure();
        }
    }
    
}
