<?php

use Data\Users\UserDTO;
use Repositories\Users\UserRepository;
use Services\Encryption\ArgonEncryptionService;
use Services\Users\UserService;

require_once 'index.php';

$username = readline();
$password = readline();


$userService = new UserService(
    new UserRepository($db),
    new ArgonEncryptionService()
);

if($userService->verifyCredentials($username, $password)){
    echo "You are loggined";
} else {
    echo "NOOOOOO you can't login!";
}
