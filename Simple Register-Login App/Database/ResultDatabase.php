<?php

namespace Database;

class ResultDatabase implements ResultInterface
{

    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }


    public function fetch($className): \Generator
    {
        while($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
   
}