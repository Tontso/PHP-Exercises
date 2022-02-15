<?php

namespace Driver;

interface StatementInterface
{
    public function execute(array $params = []) : ResultSetInterface;
}