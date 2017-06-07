<?php
abstract class User{
    private $mail;

    private $name;

    private $pass;

    private $id;

    private $avatar;


    public function __construct($mail, $name, $pass)
    {
        $this->setMail($mail);
        $this->setName($name);
        $this->setPass($pass);
        $this->setId();
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function setName($firstName)
    {
            $this->name = $firstName;
    }

    public function setPass($pass, $confirmPass)
    {
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $this->pass = $pass;
    }
}
