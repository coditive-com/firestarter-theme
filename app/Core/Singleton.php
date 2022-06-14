<?php

namespace App\Core;

abstract class Singleton
{
    protected static array $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception('Cannot unserialize singleton');
    }

    public static function get(): Singleton
    {
        $class = get_called_class();

        if (! isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}
