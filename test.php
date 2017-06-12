<?php
// var_dump($_SERVER);

/**
 *
 */
trait TraitName
{
    function functionName()
    {
        echo "funca";
    }
}
/**
 *
 */
class ClassName
{
use TraitName;
public function sarasa()
{
    $this->functionName();
}
}

$test = new ClassName;
$test->sarasa();
