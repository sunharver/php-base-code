<?php

namespace Factory;

use Factory\PaySimpleFactory;

class AliPay implements PaySimpleFactory
{
    public function pay()
    {
        return "this is alipay";
    }
}