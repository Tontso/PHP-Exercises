<?php

session_start();
spl_autoload_register();

use App\Http\UserHttpHandler;
use App\Repository\UserRepository;
use App\Services\Encryption\ArgonService;
use App\Services\UserService;
use Core\DataBinder;
use Core\Template;
use Database\PDODatabase;

$template = new Template();
$dataBinder = new DataBinder();

$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new PDODatabase($pdo);
$userRepository = new UserRepository($db);
$enctyprion = new ArgonService();
$userService = new UserService($userRepository, $enctyprion);
$userHttpHander = new UserHttpHandler($template, $dataBinder);