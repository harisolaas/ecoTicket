<?php
require_once 'class.UsersRepo.php';

class JSONUsersRepo extends UsersRepo
{
    public $users;

    public function __construct()
    {
        $users = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/ecoTicket/json/users.json');
        $users = json_decode($users, true);
        $this->users = $users;
    }

    public function getUserByMail($mail)
    {
        if (isset($this->users[$mail])) {
            return $this->users[$mail];
        }else {
            return null;
        }
    }

    public function updateUsers($updatedUsersArray)
    {
        $updatedUsersArray = json_encode($updatedUsersArray);
        file_put_contents($_SERVER["DOCUMENT_ROOT"].'/ecoTicket/json/users.json', $updatedUsersArray);
    }

    public function saveUser(User $newUser)
    {
        $user = [
            'id' => $newUser->id,
            'name' => $newUser->name,
            'lastName' => $newUser->lastName,
            'pass' => $newUser->pass,
        ];

        $users = $this->users;
        $users[$newUser->mail] = $user;
        $this->updateUsers($users);
    }

}
