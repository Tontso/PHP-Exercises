<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Services\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    
    public function register(UserServiceInterface $userService, array $formData = [])
    {
        if(isset($formData['register'])){
            $this->handleRegisterProcess($userService,$formData);
        } else {
            $this->render("users/register");
        }
    }

    public function login(UserServiceInterface $userService, array $formData = [])
    {
        if(isset($formData['login'])){
            $this->handleLoginProcess($userService,$formData);
        } else {
            $this->render("users/login");
        }
    }
    
    public function handleRegisterProcess(UserServiceInterface $userService, array $formData = [])
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);
        if($userService->register($user, $formData['confirm_password'])){
            $this->redirect("login.php");
        } else {
            $this->render('users/register');
        }
    }


    public function handleLoginProcess(UserServiceInterface $userService, array $formData = [])
    {
        $user = $userService->login($formData['username'], $formData['password']);
        if(null !== $user){
            $_SESSION['id'] = $user->getId();
            $this->redirect("my-profile.php");
        } else {  
            $this->render("app/error",new ErrorDTO("Username does not exist or password missmatch"));
        }
    }

    public function editProfile(UserServiceInterface $userService, array $formData = [])
    {
        if(!$userService->isLogged()){
            $this->redirect("login.php");
        }

        $currentUser = $userService->currentUser();
        if(isset($formData['edit'])){
            $this->handleEdidProcess($userService, $formData);
        } else {
            $this->render("users/edit-profile", $currentUser);
        }
    }


    public function handleEdidProcess(UserServiceInterface $userService, array $formData = [])
    {
        $currentUser = $userService->currentUser();
        if($formData['password'] === $formData['confirm_password']){
            $currentUser = $this->dataBinder->bind($formData, UserDTO::class);
        }

        if($userService->edit($currentUser)){
            $this->redirect("profile.php");
        }
    }

    public function index()
    {
        $this->render("home\index");
    }


    public function showMyProfile(UserServiceInterface $userService, array $formData = [])
    {
        $currentUser = $userService->currentUser();
        $this->render("users/my-profile",$currentUser);
    }


}