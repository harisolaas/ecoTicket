<?php
require_once "interface.validable.php";
require_once "trait.IsUserSet.php";


class UserValidator implements Validable {
    use IsUserSet;
    public function validate($data, $repo){
        $errors = [];

        // VALIDATION FIRST NAME
        $firstName = trim($_POST["name"]);
        if (!$firstName){
            $errors[] = 'Te olvidaste de ingresar tu nombre';
        }    elseif(strlen($firstName) > 30){
            $errors[] = 'El nombre es demasiado largo';
        }


        // VALIDATION LAST NAME
        $lastName = trim($_POST["lastName"]);
        if (!$lastName){
            $errors[] = 'Te olvidaste de ingresar tu apellido';
        }
        elseif(strlen($lastName) > 30){
            $errors[] = 'El apellido es demasiado largo';
        }

        // VALIDATION PASSWORD vs CONFIRM_PASSWORD
        $pass = $_POST['pass'];
        $confirmPass = $_POST['confirm-pass'];
        if(isset($_POST['pass']) && isset($_POST['confirm-pass'])){
            if($_POST['pass'] !== $_POST['confirm-pass']){
                $errors[] = 'Los Passwords no coinciden';


        // VALIDATION  PASSWORD  LENGTH
            } elseif(strlen($_POST['pass']) < 6){
                $errors[] = 'Debes ingresar un Passsword de al menos 6 caracteres';
            }  elseif (strlen($_POST['pass']) >= 12) {
                $errors[] = 'Debes ingresar un Password de hasta 12 caracteres';
            }

        }

            //VALIDATION EMAIL
            $email = trim($_POST['email']);
            $validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

            if($validateEmail === false){
                $errors[]= 'Por favor ingresar un Email valido';
            }
            //CHECK THIS WHEN DOING CLASS USERS & DATABASE
            elseif(isUserSet()){
            $errors[] = 'Este email ya esta registrado';
        }



        return $errors;
    };

}
