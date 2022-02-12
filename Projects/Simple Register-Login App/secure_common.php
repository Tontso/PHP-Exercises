<?php

use Repositories\Users\UserRepository;
use Services\Encryption\ArgonEncryptionService;
use Services\Users\UserService;

require_once 'common.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];

$userService = new UserService(
    new UserRepository($db),
    new ArgonEncryptionService()
);

$currentUser = $userService->findById($id);
