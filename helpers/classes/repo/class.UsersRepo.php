<?php

abstract class UsersRepo
{
    public function saveUser(User $user){}
    public function getUserByMail($mail){}
    public function getUserField($mail, $field){}
}
