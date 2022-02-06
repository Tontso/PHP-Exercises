<?php

namespace Database;

class StatementDatabase implements StatementInterface
{

    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {   
        $this->pdoStatement = $pdoStatement;
    }
    
 
    public function execute(array $param = []): StatementInterface
    {
        $this->pdoStatement->execute($param);
        
        return $this;
    }
    

    public function fetch(): \Generator
    {
        $row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC);
        while(false !== $row){
            yield $row;
            $row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC);
        }

        return $row;
    }

}