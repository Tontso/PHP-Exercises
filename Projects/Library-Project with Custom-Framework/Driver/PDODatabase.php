<?php

namespace Driver;

use PDO;

class PDODatabase implements DatabaseInterface
{

    private $pdo;

    public function __construct($host, $user, $pass, $name) {
        $dsn = "mysql:host=" . $host . ";dbname=" . $name;
        $this->pdo = new PDO($dsn, $user, $pass);
    }

    public function query($query): StatementInterface
    {   
        $stmt = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);
    }
}