<?php

namespace Factory;

use Factory\PaySimpleFactory;

class WechatPay implements PaySimpleFactory
{

    public function pay()
    {
        return "this is wechatpay";
    }

}