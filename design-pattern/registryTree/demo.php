<?php

require_once  "../vendor/autoload.php";

use RegistryTree\RegistryTrees;

class Demo
{
    public function index()
    {
        echo "dsdsdsds\n";
    }
}

$demo = new Demo();
$demo->index();

RegistryTrees::set("demo", $demo);
$demo1 = RegistryTrees::get("demo");
$demo1->index();
