<?php
require 'support.variables.php';

$db = new PDO($dbDSN,$dbUser,$dbPass);

$query = $db->query('SELECT * from actor');

$query = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($query);
