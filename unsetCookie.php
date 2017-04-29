<?php
foreach ($_COOKIE as $key) {
    setcookie($key, '', (time() - 60 * 60 * 24 * 15), '/');
}
var_dump($_COOKIE);
 ?>
<a href="testCookie.php">Test Cookie</a>
