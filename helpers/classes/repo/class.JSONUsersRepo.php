<?php
require_once 'class.UsersRepo.php';

class JSONUsersRepo extends UsersRepo
{
    public $users;

    public $usersID;

    public function __construct()
    {
        $users = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/ecoTicket/json/users.json');
        $users = json_decode($users, true);
        $this->users = $users;

        $usersID = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/ecoTicket/json/userID.json');
        $usersID = json_decode($usersID, true);
        $this->usersID = $usersID;
    }

    public function getUserByMail($mail)
    {
        if (isset($this->users[$mail])) {
            return $this->users[$mail];
        }else {
            return null;
        }
    }

    public function getUserField($mail, $field)
    {
        return $this->users[$mail][$field];
    }

    public function updateUsers($updatedUsersArray, $updatedUsersIDArray = null)
    {
        $updatedUsersArray = json_encode($updatedUsersArray);
        file_put_contents($_SERVER["DOCUMENT_ROOT"].'/ecoTicket/json/users.json', $updatedUsersArray);

        if ($updatedUsersIDArray) {
            $updatedUsersIDArray = json_encode($updatedUsersIDArray);
            file_put_contents($_SERVER["DOCUMENT_ROOT"].'/ecoTicket/json/userID.json', $updatedUsersIDArray);
        }
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

        $usersID = $this->usersID;
        $usersID[$newUser->id] = $newUser->mail;

        $this->updateUsers($users, $usersID);
    }

}
