<?php

use Data\Users\UserDTO;
use Exception\User\RegistrationException;
use Repositories\Users\UserRepository;
use Services\Encryption\ArgonEncryptionService;
use Services\Users\UserService;

require_once 'common.php';

$error = '';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $corfirmPassword = $_POST['confirm'];

    $userDTO = new UserDTO();
    $userDTO->setUsername($username);
    $userDTO->setPassword($password);
    $userDTO->setConfirmPassword($corfirmPassword);

    $userService = new UserService(
        new UserRepository($db),
        new ArgonEncryptionService()
    );

    try{
        $userService->register($userDTO);
        header("Location: login.php");
        exit;
    } catch (RegistrationException $ex){
        $error = $ex->getMessage();
    } catch (Exception $e){
        $error = "Something went wrong.";
    }
}

require_once 'views/users/register.php';