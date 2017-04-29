<?php
$_SESSION['email'] = 'hari@solaas.com';
var_dump($_SESSION);echo "<br>";echo "<br>";
$string = $_SESSION['email'];
$string = "value="."'$string'"." style='background-color: #ffffcc;'";
var_dump($string);
 ?>
