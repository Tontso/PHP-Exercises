<?php

namespace App\Repository;

use Core\DataBinderInterface;
use Database\DatabaseInterface;

abstract class DatabaseAbstract
{
    /**
     * @var DatabaseInterface $db;
     */
    protected $db;

    /**
     * @var DataBinderInterface $dataBinder
     */
    protected $dataBinder;


    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder) {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }
}