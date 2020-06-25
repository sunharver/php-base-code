<?php

include "DbSingleton.php";

$a = DbSingleton::getInstance();
$b = DbSingleton::getInstance();

//$cloneInstance = clone $a;
//var_dump($a, $b, $cloneInstance);
$serialize = unserialize(serialize($a));
var_dump($a, $b, $serialize);
