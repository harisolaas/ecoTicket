<?php
$pass = 123456;
$pass = password_hash($pass, PASSWORD_BCRYPT);
var_dump($pass);echo "<br>";echo "<br>";
$users['h.solaas1@gmail.com'] = [
    'nombre' => 'Harald',
    'apellido' => 'Solaas',
    'pass' => $pass
];
var_dump($users);echo "<br>";echo "<br>";
$users = json_encode($users);
var_dump($users);echo "<br>";echo "<br>";
file_put_contents('json/users.json', $users);
 ?>
