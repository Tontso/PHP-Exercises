<?php

namespace Controllers;

use Core\Services\Authentication\AuthenticationServiceInterface;
use Core\Services\Users\UserServiceInterface;
use DTO\LoginUserBindingModel;
use DTO\ProfileEditBindingModel;
use DTO\ProfileEditViewModel;
use DTO\RegisterUserBindingModel;
use DTO\UserViewModel;
use PDO;
use ViewEngine\View;
use ViewEngine\ViewInterface;

class Users
{
    public function hello(string $firstName, string $lastName, ViewInterface $view)
    {
        $viewModel = new UserViewModel($firstName, $lastName);
        $view->render($viewModel);
    }

    public function edit($id, ProfileEditBindingModel $model, ViewInterface $view)
    {
        $viewModel = new ProfileEditViewModel(
            $id, 
            $model->getUsername(),
            $model->getPassword(),
            $model->getEmail(),
            $model->getBirthday()    
        );
        $view->render($viewModel);
    }

    public function register(ViewInterface $view)
    {
        $view->render();
    }

    public function registerPost(UserServiceInterface $userService, 
                            RegisterUserBindingModel $bindingModel)
    {
        if($userService->register($bindingModel->getUsername(), $bindingModel->getPassword())) {
            header("Location: /Custom-Framework/users/login");
            exit;
        }

        header("Location: /Custom-Framework/users/register");
        
    }

    public function login(ViewInterface $view)
    {
        $view->render();
    }

    public function loginPost(AuthenticationServiceInterface $authenticationService, 
                            LoginUserBindingModel $bindingModel)
    {;
        if($authenticationService->login($bindingModel->getUsername(), $bindingModel->getPassword())) {
            header("Location: /Custom-Framework/users/profile");
            exit;
        }
        header("Location: /Custom-Framework/users/login");
    }

    public function profile(AuthenticationServiceInterface $authenticationService, ViewInterface $view)
    {
        if(!$authenticationService->isLogged()){
            header("Location: /Custom-Framework/users/login");
            exit;
        }
        $view->render();
    }
}