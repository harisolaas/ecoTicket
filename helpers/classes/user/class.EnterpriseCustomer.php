<?php
require_once 'class.user.php';

/**
 *
 */
class EnterpriseCustomer extends User
{

    function __construct($mail,$name,$pass)
    {
        parent::__construct($mail,$name,$pass)
    }
}
