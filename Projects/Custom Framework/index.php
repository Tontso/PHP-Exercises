<?php

use Core\Application;
use Core\Http\Component\Session;
use Core\Http\Component\SessionInterface;
use Core\Mvc\MvcContext;
use Core\Services\Authentication\AuthenticationService;
use Core\Services\Authentication\AuthenticationServiceInterface;
use Core\Services\Encryption\BCryptEncryptionService;
use Core\Services\Encryption\EncryptionServiceInterface;
use Core\Services\Users\UserService;
use Core\Services\Users\UserServiceInterface;
use Driver\DatabaseInterface;
use Driver\PDODatabase;
use ViewEngine\View;
use ViewEngine\ViewInterface;

spl_autoload_register();

session_start();


$uri = $_SERVER['REQUEST_URI'];
$self = explode("/", $_SERVER['PHP_SELF']);
array_pop($self);
$replace = implode("/", $self);
$uri = str_replace($replace."/", "", $uri);

$params = explode("/", $uri);
$controllerName = array_shift($params);
$actionName = array_shift($params);

$mvcContext = new MvcContext($controllerName, $actionName, $params);
$app = new Application($mvcContext);

$app->addBean(
    DatabaseInterface::class, 
    new PDODatabase("localhost", "*****#NOT :( *****", "********#NOT :( *******", "blog"));

$app->addBean(
    SessionInterface::class, 
    new Session($_SESSION));

$app->registerDependency(
    ViewInterface::class, 
    View::class);

$app->registerDependency(
    EncryptionServiceInterface::class,
    BCryptEncryptionService::class
);

$app->registerDependency(
    AuthenticationServiceInterface::class, 
    AuthenticationService::class);

$app->registerDependency(
    UserServiceInterface::class,
    UserService::class
);

$app->start();


