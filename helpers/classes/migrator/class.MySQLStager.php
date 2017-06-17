<?php

require_once 'interface.Stageable.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoTicket/support.variables.php';

class MySQLStager implements Stageable
{
    public $db;

    function __construct()
    {
        global $dbDSN;
        global $dbUser;
        global $dbPass;
        $this->db = new PDO($dbDSN,$dbUser,$dbPass);
    }

    public function toArray()
    {
        $data = $this->db->query('SELECT * FROM user');
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
