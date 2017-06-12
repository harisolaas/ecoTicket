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

}
