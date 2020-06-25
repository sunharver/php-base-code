<?php

namespace Observer;

class EventClient extends EventGenerator
{
    public function eventStart()
    {
        echo "event start\n";
    }
}