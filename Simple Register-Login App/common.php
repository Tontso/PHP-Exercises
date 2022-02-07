<?php

session_start();

spl_autoload_register(function($className){
    require_once $className . '.php';
});

$pdo = new PDO("mysql:dbname=session_test_db;host=localhost:3306", "root", "");
$db = new Database\PDODatabase($pdo);




