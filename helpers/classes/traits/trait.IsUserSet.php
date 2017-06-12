<?php

trait IsUserSet {
    public function isUserSet(){
        // global $users;
        // return isset($users[$_POST['email']]);
        $repo->isUserSet();
    }
}
