<?php

namespace DesignPattern;

abstract class Prototype
{
    public mixed $x;

    public mixed $y;

    public function new(self $prototype): self
    {
        $this->x = $prototype->x;
        $this->y = $prototype->y;

        return $this;
    }

    abstract public function clone();
}

class ConcretePrototype extends Prototype
{
    public mixed $z;

    public function new($prototype): self
    {
        parent::new($prototype);

        $this->z = $prototype->z;

        return $this;
    }

    public function clone()
    {
       return $this->new($this);
    }
}

class PrototypePattern
{
    public function __invoke()
    {
        $main = new ConcretePrototype();

        $clone = $main->clone();
    }
}




