<?php

namespace Controllers;

use Core\Services\Authentication\AuthenticationService;
use Core\Services\Authentication\AuthenticationServiceInterface;
use Core\Services\Books\BookServiceInterface;
use Core\Services\Users\UserServiceInterface;
use DTO\UserDTO;
use ViewEngine\ViewInterface;

class Users
{


    public function register(ViewInterface $view)
    {
        $view->render();
    }

    public function registerPost(UserServiceInterface $userService, 
                            UserDTO $bindingModel)
    {
        if($userService->register($bindingModel)) {
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
                            UserDTO $bindingModel)
    {
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
        $user = $authenticationService->getCurrentUser();
        $view->render($user);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /Custom-Framework/users/login");
        exit;

    }

    public function showMyBooks(ViewInterface $view, AuthenticationServiceInterface $auth, BookServiceInterface $bookService)
    {
        $currentUser = $auth->getCurrentUser();
        $allBooks = $bookService->getAllByUserId($currentUser->getId());
        $view->render($allBooks, "books/my_books");
    }
}