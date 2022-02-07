<?php

namespace Database;

class StatementDatabase implements StatementInterface
{

    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {   
        $this->pdoStatement = $pdoStatement;
    }

    public function execute(array $param = []): ResultInterface
    {
        $this->pdoStatement->execute($param);
        return new ResultDatabase($this->pdoStatement);
    }
    
}