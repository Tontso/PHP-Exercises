<?php

namespace Database;

class PDODatabase implements DatabaseInterface
{

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query): StatementInterface
    {
        return new StatementDatabase($this->pdo->prepare($query)); 
    }
}