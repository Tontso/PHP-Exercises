<?php

use Data\Users\UserDTO;
use Repositories\Users\UserRepository;
use Services\Encryption\ArgonEncryptionService;
use Services\Users\UserService;

require_once 'index.php';

$username = readline();
$password = readline();
$corfirmPassword = readline();

$userDTO = new UserDTO($username, $password, $corfirmPassword);

$userService = new UserService(
    new UserRepository($db),
    new ArgonEncryptionService()
);

try{
    $userService->register($userDTO);
} catch (Exception $ex){
    echo $ex->getMessage();
}