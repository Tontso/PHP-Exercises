<?php

spl_autoload_register(function($className){
    require_once $className . '.php';
});

$pdo = new PDO("****************************);
$db = new Database\PDODatabase($pdo);


