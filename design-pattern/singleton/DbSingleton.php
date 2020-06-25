<?php

# 单例模式实现记住一个口诀，四私一公。四个私有方法，包括私有构造，私有实例名称，私有克隆，私有反序列化，一个获取实例的公共方法。

class DbSingleton
{
    // 私有构造方法
    private function __construct(){}

    // 私有克隆方法
    private function __clone(){}

    // 防止反序列化生成新对象
    private function __wakeup(){}

    // 私有化一个属性用于存放实例
    private static $instance;

    public static function getInstance()
    {
        if (! self::$instance instanceof DbSingleton) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}