<?php

namespace Database;

interface StatementInterface
{
    public function execute(array $param = []): StatementInterface;
    
    public function fetch(): \Generator;
}