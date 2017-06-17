<?php

require_once 'interface.Initiable.php';

class JSONInit implements Initiable
{
    public function init($data)
    {
        $users = [];
        $userID = [];

        foreach ($data as $key => $value)
        {
            $users[$value['mail']] = [
                'id' => $value['id_json'],
                'name' => $value['name'],
                'lastName' => $value['lastName'],
                'pass' => $value['pass']
            ];

            $userID[$value['id_json']] = $value['mail'];
        }

        $users = json_encode($users);
        $userID = json_encode($userID);

        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ecoticket/json/users.json',$users);
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ecoticket/json/userID.json',$userID);
    }
}
