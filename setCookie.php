<?php
setcookie('test', 'test', (time() + 60 * 60 * 24 * 15), '/', '', 1, true);
var_dump($_COOKIE);
 ?>
 <a href="testCookie.php">Test Cookie</a>
