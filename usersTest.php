<?php
include('helpers/users.library.php');
openUsers();

// $users = [];

setUserEmail('h.solaas1@gmail.com');
setUserID('h.solaas1@gmail.com');
setUserFullName('h.solaas1@gmail.com', 'Harald', 'Solaas');
setUserPassword('h.solaas1@gmail.com', '123456');
var_dump($users);

updateUsers();

 ?>
