<?php

class DecimalNumber
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function printReversed(): void
    {
        echo strrev($this->value) . PHP_EOL;
    }
}