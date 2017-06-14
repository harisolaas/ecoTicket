<?php

require_once 'class.JSONStager.php';

require_once 'class.MySQLStager.php';

class Migrator
{
    public $currentDB;

    public $newDB;

    function __construct($currentDB,$newDB)
    {
        $this->currentDB = new $currentDB.Stager();
        $this->newDB = $newDB.Saver();
    }

    public function migrate()
    {
        $data = $this->currentDB->toArray();

        $this->newDB->init($data);
    }
}
