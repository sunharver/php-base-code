<?php

namespace Observer;

class ObserverTwo implements Observer
{

    public function update()
    {
        echo "ob two do!\n";
    }

}