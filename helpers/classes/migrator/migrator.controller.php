<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ecoticket/support.variables.php';

require_once 'class.Migrator.php';

$migrator = new Migrator($dbType, 'MySQL');

var_dump($migrator);echo "<br>";

$migrator = $migrator->migrate();

var_dump($migrator);echo "<br>";
