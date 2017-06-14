<?php
$array = [
    'uno' => [1],
    'dos' => [1,2]
];

var_dump($array);echo "<br>";

$newArray = [];

foreach ($array as $key => $value)
{
    $value['mail'] = $key;
    $newArray[] = $value;
}

var_dump($newArray);echo "<hr>";

$arr = array(1, 2, 3, 4);
var_dump($arr);echo "<br>";
foreach ($arr as &$value) {
    $value = $value * 2;
}
var_dump($arr);
