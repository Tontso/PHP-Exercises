<?php

namespace Driver;

use PDOStatement;

class PDODatabaseStatement implements DatabaseStatementInterface
{

    /**
     * @var PDOStatement 
     */
    private $statement;

    public function __construct(PDOStatement $statement) {
        $this->statement = $statement;
    }
    
    public function fetch(): array
    {
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  
    public function fetchRow()
    {
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function execute(array $args = null): bool
    {
        return $this->statement->execute($args);
    }

}