<?php

require_once 'class.Authenticator.php';

/**
 *
 */
class EntAuth extends Authenticator
{
    public function logIn($userMail)
    {
        $_SESSION['userType'] = 'Enterprise';
        parent::logIn($userMail);
    }

}
