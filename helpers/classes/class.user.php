<?php
abstract class User{
    public $mail;

    public $name;

    public $pass;

    public $id;

    public $avatar;


    public function __construct($userData)
    {
        $this->setMail($userData['mail']);
        $this->setName($userData['name']);
        $this->setPass($userData['pass']);
        $this->setId();
    }

    public function save(){}

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function setName($firstName)
    {
            $this->name = $firstName;
    }

    public function setPass($pass)
    {
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $this->pass = $pass;
    }

    public function setId()
    {
        $a = ['a','b','c','d','e','f','g', 'h', 'i', 'j', 'k', 'l','m','n','o', 'p','q','r','s','t','u','v', 'w'];
        $id = $a[rand(0, count($a))].time();
        $this->id = $id;
    }
}
