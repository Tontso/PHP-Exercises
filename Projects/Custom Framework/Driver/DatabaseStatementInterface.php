<?php

namespace Driver;

interface DatabaseStatementInterface
{
    /**
     * returns an array with all rows
     */
    public function fetch(): array;

    /**
     * returns one row 
     */
    public function fetchRow();

    /**
     * executes a statement and returns whether it happended
     */
    public function execute(): bool;
    
}