<?php

namespace DesignPattern;

class A
{
    private const maxIns = 2;

    private static array $as = [];

    private function __construct()
    {
    }

    private function __clone()
    {

    }

    public function __wakeup()
    {
        throw new \RuntimeException("Cannot unserialize a singleton.");
    }

    public static function getA(): array
    {
        if (count(self::$as) < self::maxIns) {
            self::$as[] = new self();
        }

        return self::$as;
    }
}

class B extends A
{

}

class SingletonPattern
{
    public function __invoke()
    {
        $a = A::getA();

        $b = B::getA();


    }
}




