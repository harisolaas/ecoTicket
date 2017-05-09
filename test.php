<?php
function randLetter()
{
    $a = ['a','b','c','d','e','f','g', 'h', 'i', 'j', 'k', 'l','m','n','o', 'p','q','r','s','t','u','v', 'w'];
    return $a[rand(0, count($a))];
}
$id = file_get_contents('json/userID.json');
$id = json_decode($id, true);
$id[randLetter().time()]['email'] = 'h.solaas1@gmail.com';
$id = json_encode($id);
var_dump($id);
file_put_contents('json/userID.json', $id);
 ?>
