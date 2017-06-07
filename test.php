<?php
// var_dump($_SERVER);

/**
 *
 */
class ClassName
{
    public $array = ['test' => 1];

    public function getUserByMail($mail)
    {
        if (isset($this->array[$mail])) {
            return $this->array[$mail];
        }else {
            return null;
        }
    }
}

$test = new ClassName();
var_dump($test);echo "<br>";
var_dump(boolval($test->getUserByMail('test')));echo "<br>";
