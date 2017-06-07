<?php
require_once 'class.user.php';
/**
 *
 */
class PhisicalCustomer extends User
{
    public $lastName;

    function __construct($userData)
    {
        parent::__construct($userData);
        $this->lastName = $userData['lastName'];
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}
