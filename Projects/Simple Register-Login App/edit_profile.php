<?php

require_once 'secure_common.php';

$error = '';

if(isset($_POST['edit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $corfirmPassword = $_POST['confirm'];
}

require_once 'views/users/edit_profile.php';