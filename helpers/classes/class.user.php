<?php
class User{
    private $mail;

    private $name;

    private $lastName;

    private $pass;

    private $avatar;


    public function __construct($mail, $name, $lastName, $pass, $confirmPass)
    {
        $this->setMail($mail);
        $this->setName($name);
        $this->setLastName($lastName);
        $this->setPass($pass, $confirmPass);
    }

    public function setMail($mail)
    {
        if ($this->mailValidation($mail)) {
            $this->mail = $mail;
        }
    }

    public function mailValidation($mail)
    {
        global $errors;
        $mail = trim($mail);
        $validateEmail = filter_var($mail, FILTER_VALIDATE_EMAIL);

        if(!$validateEmail)
        {
            $errors['mail']['invalid'] = 'El mail ingresado en inválido!';
        }
        else
        {
            return true;
        }
    }

    public function setName($firstName)
    {
        if($this->nameValidation($firstName)){
            $this->name = $firstName;
        }
    }

    public function nameValidation($firstName)
    {
        global $errors;
        $firstName = trim($firstName);
        if(strlen($firstName) > 30)
        {
            $errors['firstName']['tooLong'] = 'El nombre es demasiado largo';
        }else{
            return true;
        }
    }

    public function setLastName($lastName)
    {
        if($this->lastNameValidation($lastName))
        {
            $this->lastName = $lastName;
        }
    }

    public function lastNameValidation($lastName)
    {
        global $errors;
        $lastName = trim($lastName);
        if(strlen($lastName) > 30){
            $errors['lastName']['tooLong'] = 'El apellido es demasiado largo';
        }else
        {
            return true;
        }
    }

    public function setPass($pass, $confirmPass)
    {
        if ($this->passValidation($pass, $confirmPass)) {
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $this->pass = $pass;
        }
    }

    public function passValidation($pass, $confirmPass)
    {
        global $errors;
        if($pass !== $confirmPass){
            $errors['pass']['invalidConfirmPass'] = 'Los Passwords no coinciden';
        } elseif(strlen($pass) < 6){
            $errors['pass']['passTooShort'] = 'Debes ingresar un Passsword de al menos 6 caracteres';
        }  elseif (strlen($pass) >= 12) {
            $errors['pass']['passTooLong'] = 'Debes ingresar un Password de hasta 12 caracteres';
        }else{
            return true;
        }
    }


}
