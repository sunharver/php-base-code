<?php

namespace Factory;

class StaticFactory
{

    public static function pay($operate)
    {
        switch ($operate) {
            case "alipay":
                $payInstance = new AliPay();
                break;
            case "wechatpay":
                $payInstance = new WechatPay();
                break;
            default:
                throw new \Exception("this isnt object");
                break;
        }
        return $payInstance;
    }

}