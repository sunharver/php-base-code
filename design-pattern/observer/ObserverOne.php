<?php

namespace Observer;

class ObserverOne implements Observer
{
    public function update()
    {
        echo "ob one do!\n";
    }
}