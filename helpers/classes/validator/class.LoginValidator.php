<?php

require_once 'interface.Validable.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoticket/helpers/classes/traits/trait.IsDataCorrect.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoticket/helpers/classes/traits/trait.IsPassCorrect.php';

class LoginValidator implements Validable{
        //TRAITS
    use IsDataCorrect;
    use IsPassCorrect;
        //VALIDATE LOGIN
    public function validate($data, $repo){
        $errors = null;

        if (!$this->isDataCorrect()){
            $errors['missingData'] = '*Campo requerido';
        }
        elseif(!$repo->getUserByMail($data['mail'])){
            $errors['errormail'] = '*La dirección de correo ingresada no figura en nuestra base de datos!';
        }
        elseif(!$this->isPassCorrect($repo)){
            $errors['errorPass'] = '*La contraseña ingresada es incorrecta!';
        }
        return $errors;
    }
}
