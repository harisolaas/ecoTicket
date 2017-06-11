<?php
require_once 'interface.Validable.php';
require_once 'trait.IsDataCorrect.php';
require_once 'trait.IsPassCorrect.php';
require_once 'trait.IsUserSet.php';


class LoginValidator implements Validable{
        //TRAITS
    use IsDataCorrect;
    use IsUserSet;
    use IsPassCorrect;
        //VALIDATE LOGIN
    public function validate($data, $repo){
        $errors = [];


        if (!isDataCorrect()){
            $errors[] = "Data is not correct";
        }
        elseif(!isUserSet()){
            $errors[] = "User is not set";
        }
        elseif(!isPassCorrect()){
            $errors[] = "Pass is not correct";
        }
        return $errors;
    }
}
