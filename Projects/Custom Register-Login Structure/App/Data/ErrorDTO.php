<?php

namespace App\Data;

class ErrorDTO
{
    private $message;

    public function __construct(string $message) {
        $this->message = $message;
    }
    

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }
}