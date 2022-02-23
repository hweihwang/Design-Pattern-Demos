<?php

namespace DesignPattern;

interface Niu
{
    public function a(): void;
}

class Old1 implements Old
{
    public function b(): void
    {
        echo 'b';
    }
}

interface Old
{
    public function b(): void;
}

class Adapter implements Niu
{
    private Old $old;

    public function __construct(Old $old)
    {
        $this->old = $old;
    }

    public function a(): void
    {
        $this->old->b();
    }
}

class AdapterPattern
{
    public function run(Niu $niu): void
    {
        $niu->a();
    }

    public function __invoke()
    {
        $this->run(new Adapter(new Old1()));
    }
}




