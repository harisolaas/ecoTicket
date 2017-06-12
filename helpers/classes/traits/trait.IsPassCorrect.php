<?php
trait IsPassCorrect{
    public function isPassCorrect(){
            global $users;
            if (strlen($_POST['pass']) <= 12)
            {
                $validation = password_verify($_POST['pass'], $users[$_POST['email']]['pass']);
                return $validation;
            } else {
                $validation = ($_POST['pass'] == $users[$_POST['email']]['pass']);
                return $validation;
    }
}
