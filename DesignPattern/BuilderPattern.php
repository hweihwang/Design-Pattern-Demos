<?php

namespace DesignPattern;

interface Builder
{
    public function producePartA();

    public function producePartB();
}

class ConcreteBuilder1 implements Builder
{
    private Product1 $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new Product1();
    }

    public function producePartA(): self
    {
        $this->product->setPartA('PartA1');

        return $this;
    }

    public function producePartB(): self
    {
        $this->product->setPartB('PartB1');

        return $this;
    }

    public function getProduct(): Product1
    {
        $result = $this->product;
        $this->reset();

        return $result;
    }
}

class Product1
{
    private string $partA;

    private string $partB;

    public function getPartA(): string
    {
        return $this->partA;
    }

    public function setPartA($partA): void
    {
        $this->partA = $partA;
    }

    public function getPartB(): string
    {
        return $this->partB;
    }

    public function setPartB($partB): void
    {
        $this->partB = $partB;
    }
}

class Director
{
    public function build(Builder $builder): void
    {
        $builder->producePartA();
        $builder->producePartB();
    }
}

class BuilderPattern
{
    public function __invoke()
    {
        $director = new Director();
        $concreteBuilder1 = new ConcreteBuilder1();

        //Director build a product or do whatever in director class
        $director->build($concreteBuilder1);

        //Then get the product after build function
        $product1 = $concreteBuilder1->getProduct();
        var_dump($product1);
    }
}




