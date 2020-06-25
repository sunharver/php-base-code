<?php

require_once  "../vendor/autoload.php";

$event = new \Observer\EventClient();
$event->addObserver(new \Observer\ObserverOne());
$event->addObserver(new \Observer\ObserverTwo());
$event->eventStart();
$event->notify();
