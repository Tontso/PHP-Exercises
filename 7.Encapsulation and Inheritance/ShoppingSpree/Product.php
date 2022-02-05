<?php

class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $cost;

    /**
     * @param string $name
     * @param float $cost
     * @throws Exception
     */
    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
    }


    /**
     * @param string $name
     * @throws Exception
     */
    private function setName(string $name): void
    {
        if(empty($name)){
            throw new Exception("Name cannot be empty.");
        }
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $cost
     * @throws Exception
     */
    private function setCost(float $cost): void
    {
        if($cost < 0){
            throw new Exception("Cost cannot be negative.");
        }
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}