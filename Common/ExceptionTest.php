<?php

namespace Common;

class ExceptionTest
{
    public function init(): \Exception
    {
        return new \UnexpectedValueException('test');
    }

    public function test()
    {
        throw $this->init();
    }
}