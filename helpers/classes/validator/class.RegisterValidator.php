<?php

require_once "interface.validable.php";

class RegisterValidator implements Validable {

    public function validate($data, $repo){
        $errors = [];

        // VALIDATION FIRST NAME
        $firstName = trim($data["name"]);
        if (!$firstName){
            $errors[] = 'Te olvidaste de ingresar tu nombre';
        }    elseif(strlen($firstName) > 30){
            $errors[] = 'El nombre es demasiado largo';
        }


        // VALIDATION LAST NAME
        $lastName = trim($data["lastName"]);
        if (!$lastName){
            $errors[] = 'Te olvidaste de ingresar tu apellido';
        }
        elseif(strlen($lastName) > 30){
            $errors[] = 'El apellido es demasiado largo';
        }

        // VALIDATION PASSWORD vs CONFIRM_PASSWORD
        $pass = $data['pass'];
        $confirmPass = $data['confirmPass'];
        if(isset($data['pass']) && isset($data['confirmPass'])){
            if($data['pass'] !== $data['confirmPass']){
                $errors[] = 'Los Passwords no coinciden';


        // VALIDATION  PASSWORD  LENGTH
            } elseif(strlen($data['pass']) < 6){
                $errors[] = 'Debes ingresar un Passsword de al menos 6 caracteres';
            }  elseif (strlen($data['pass']) >= 12) {
                $errors[] = 'Debes ingresar un Password de hasta 12 caracteres';
            }

        }

            //VALIDATION EMAIL
            $email = trim($data['mail']);
            $validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

            if($validateEmail === false){
                $errors[]= 'Por favor ingresar un Email válido';
            }
            //CHECK THIS WHEN DOING CLASS USERS & DATABASE
            elseif($repo->getUserByMail($data['mail'])){
            $errors[] = 'Este email ya está registrado';
            }

        return $errors;
    }

}
