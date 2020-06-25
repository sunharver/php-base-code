<?php

require_once  "../vendor/autoload.php";

use Factory\SimpleFactory;
use Factory\StaticFactory;
// 简单工厂模式
//$factory = new SimpleFactory();
//$alipay = $factory->pay("alipay");
//var_dump($alipay->pay());

// 静态工厂模式
$payInstance = StaticFactory::pay("wechatpay");
var_dump($payInstance->pay());