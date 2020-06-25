<?php

namespace Factory;

class SimpleFactory
{

    public function pay($operate)
    {
        $res = null;
        switch ($operate) {
            case "alipay":
                $res = new AliPay();
                break;
            case "wechatpay":
                $res = new WechatPay();
                break;
            default:
                throw new Exception("no this object!");
                break;
        }
        return $res;
    }

}