<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoticket/support.variables.php';

require_once 'class.Migrator.php';

$migrator = new MySQLStager();

var_dump($migrator);echo "<br>";

$migrator = $migrator->toArray();

var_dump($migrator);echo "<br>";
