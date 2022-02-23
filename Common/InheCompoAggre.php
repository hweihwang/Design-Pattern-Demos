<?php

namespace Common;

use Support\Helper;

interface Shoutable
{
    public function shout();
}

class A implements Shoutable
{
    public function shout(): string
    {
        return 'A';
    }
}

class AInhe extends A
{
    public function shout(): string
    {
        return 'Inherit: ' . parent::shout();
    }
}

//A composition: A is a part of ACompo (instantiate along with ACompo no matter what)
class ACompo implements Shoutable
{
    public A $a;

    public function __construct()
    {
        $this->a = new A();
    }

    public function shout()
    {
        return 'Compose: ' . $this->a->shout();
    }
}

//A aggregate: AAggre has A as an attribute but does not need to instantiate
class AAggre implements Shoutable
{
    public A $a;

    public function __construct(A $a)
    {
        $this->a = $a;
    }

    public function shout()
    {
        return 'Aggregate: ' . $this->a->shout();
    }
}

class InheCompoAggre
{
    public function __invoke()
    {
        $a = new A;

        $aInhe = new AInhe();

        $aCompo = new ACompo();

        $aAggre = new AAggre();

        Helper::res([
            $a->shout(),
            $aInhe->shout(),
            $aCompo->shout(),
            $aAggre->shout(),
        ]);
    }
}
