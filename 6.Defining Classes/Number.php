<?php
class Number 
{
    /**
     * @var int
     */
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getLastNumberName(): string 
    {
        $single_digits = array("zero", "one", "two","three", "four", 
                                "five","six", "seven", "eight", "nine");
        return $single_digits[$this->number % 10];
    }

}


$myNumber = new Number(1255690);

echo $myNumber->getLastNumberName();