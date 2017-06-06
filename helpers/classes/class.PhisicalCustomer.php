<?php
require_once 'class.user.php';
/**
 *
 */
class PhisicalCustomer extends User
{
    public $lastName;

    function __construct($mail,$name,$pass,$lastName)
    {
        parent::__construct($mail,$name,$pass);
        $this->lastName = $lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}
