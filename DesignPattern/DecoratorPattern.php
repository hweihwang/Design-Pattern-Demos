<?php

namespace DesignPattern;

class Subject
{
    public int $cost = 0;

    public string $description = '';
}

class MilkTea extends Subject
{
    public int $cost = 5;

    public string $description = 'MilkTea';
}

class Decorator extends Subject
{
    public function __construct(public Subject $subject)
    {
        $this->subject->cost += $this->cost;
        $this->subject->description .= $this->description;
    }
}

class Sugar extends Decorator
{
    public int $cost = 1;

    public string $description = 'Sugar';

    public function __construct(public Subject $subject)
    {
       parent::__construct($subject);
    }
}


class DecoratorPattern
{
    public function __invoke()
    {
        $milkTea = new MilkTea();
        new Sugar($milkTea);
        new Sugar($milkTea);
        echo $milkTea->cost."\n";
        echo $milkTea->description."\n";
    }
}




