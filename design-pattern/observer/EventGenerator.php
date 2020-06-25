<?php

namespace Observer;

abstract class EventGenerator
{
    private static $observers;

    public function addObserver(Observer $observer)
    {
        self::$observers[] = $observer;
    }

    public function notify()
    {
        foreach (self::$observers as $ob) {
            $ob->update();
        }
    }
}