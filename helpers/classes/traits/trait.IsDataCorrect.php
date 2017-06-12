<?php
trait IsDataCorrect {
    public function isDataCorrect(){
        $email = $_POST['email'];
        $validateEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        $validateEmail = $validateEmail && boolval($email);

        $pass = $_POST['pass'];
        $validatePass = (strlen($pass) < 64) && (strlen($pass) >= 6);

        return $validatePass && $validateEmail;
    }
}
