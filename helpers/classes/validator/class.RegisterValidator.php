<?php
require_once "interface.validable.php";


class RegisterValidator implements Validable {
    public function validate($data, $model = null){
        $errors = [];

        // VALIDATION FIRST NAME
        $firstName = trim($data["name"]);
        if (!$firstName){
            $errors['errorFirsName'] = 'Te olvidaste de ingresar tu nombre';
        }    elseif(strlen($firstName) > 30){
            $errors['errorFirsName'] = 'El nombre es demasiado largo';
        }


        // VALIDATION LAST NAME
        $lastName = trim($data["lastName"]);
        if (!$lastName){
            $errors['errorLastName'] = 'Te olvidaste de ingresar tu apellido';
        }
        elseif(strlen($lastName) > 30){
            $errors['errorLastName'] = 'El apellido es demasiado largo';
        }

        // VALIDATION PASSWORD vs CONFIRM_PASSWORD
        $pass = $data['pass'];
        $confirmPass = $data['confirmPass'];
        if(isset($data['pass']) && isset($data['confirmPass'])){
            if($data['pass'] !== $data['confirmPass']){
                $errors['errorPass'] = 'Los Passwords no coinciden';


        // VALIDATION  PASSWORD  LENGTH
            } elseif(strlen($data['pass']) < 6){
                $errors['errorPass'] = 'Debes ingresar un Passsword de al menos 6 caracteres';
            }  elseif (strlen($data['pass']) >= 12) {
                $errors['errorPass'] = 'Debes ingresar un Password de hasta 12 caracteres';
            }

        }

            //VALIDATION mail
            $mail = trim($data['mail']);
            $validatemail = filter_var($mail, FILTER_VALIDATE_EMAIL);

            if($validatemail === false){
                $errors['errormail']= 'Por favor ingresar un mail valido';
            }
            //CHECK THIS WHEN DOING CLASS USERS & DATABASE
            elseif($model->getUserByMail($data['mail'])){
            $errors['errormail'] = 'Este mail ya esta registrado';
        }



        return $errors;
    }

}
