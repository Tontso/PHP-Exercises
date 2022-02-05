<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $money;

    /**
     * @var Product[]
     */
    private $products;

    /**
     * @param string $name
     * @param float $money
     * @throws Exception
     */
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
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

    /**
     * @param float $money
     * @throws Exception
     */
    private function setMoney(float $money): void
    {
        if($money < 0){
            throw new Exception("Money cannot be negative.");
        }
        $this->money = $money;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function buyProduct(Product $product): void
    {
        if($this->haveEnoughMoney($product->getCost())){
            $this->addProduct($product);
            $this->money -= $product->getCost();
        } else {
            echo "{$this->name} can't afford {$product->getName()}";
        }
        
    }

    private function haveEnoughMoney(float $cost): bool
    {
        if($this->money >= $cost){
            return true;
        } 
        return false;
    }

}