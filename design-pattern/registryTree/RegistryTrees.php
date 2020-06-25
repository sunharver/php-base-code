<?php

namespace RegistryTree;

class RegistryTrees
{
    private static $objects;

    public static function set($alias, $object)
    {
        if (!isset(self::$objects[$alias])) {
            self::$objects[$alias] = $object;
        }
    }

    public static function get($alias)
    {
        if (isset(self::$objects[$alias])) {
            return self::$objects[$alias];
        }
    }

    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}