<?php
trait IsPassCorrect{
    public function isPassCorrect($repo)
    {
        if (strlen($_POST['pass']) <= 12)
        {
            $validation = password_verify($_POST['pass'], $repo->getUserField($_POST['mail'],'pass'));
            return $validation;
        } else {
            $validation = ($_POST['pass'] == $users[$_POST['mail']]['pass']);
            return $validation;
        }
    }
}
