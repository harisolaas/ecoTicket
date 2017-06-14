<?php

require_once 'interface.Stageable.php';

class JSONStager implements Stageable
{

    function __construct()
    {

    }

    public function toArray()
    {
        $stagedData = [];
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/ecoticket/json/users.json');
        $data = json_decode($data, true);
        foreach ($data as $mailKey => $userData)
        {
            $userData['mail'] = $mailKey;
            $stagedData[] = $userData;
        }
        return $stagedData;
    }
}
