<?php

use Repositories\Users\UserRepository;
use Services\Encryption\ArgonEncryptionService;
use Services\Users\UserService;

require_once 'common.php';

$error = '';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $userService = new UserService(
        new UserRepository($db),
        new ArgonEncryptionService()
    );

    if($userService->verifyCredentials($username, $password)){
        $user = $userService->findByUsername($username);
        // echo "MY USER IS:" . var_dump($user) . "</br>";
        echo var_dump($user);
        $_SESSION['id'] = $user->getId();
        header("Location: profile.php");
    } else {
        $error = "Invalid Username or Password! Try again!";
    }
}

require_once 'views/users/login.php';