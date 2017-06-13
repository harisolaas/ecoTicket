<?php
trait TraitName
{
    function sarasa()
    {
        echo "funca";
    }
}

class ClassName
{
    use TraitName;
}

$test = new ClassName();
$test->sarasa();
