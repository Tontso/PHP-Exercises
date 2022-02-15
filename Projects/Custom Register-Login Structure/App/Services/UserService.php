<?php

namespace App\Services;

use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;
use App\Services\Encryption\EncryptionInterface;

class UserService implements UserServiceInterface
{   
    /**
     * @var UserRepositoryInterface $userRepository
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface $encryptionService
     */
    private $encryptionService;

    public function __construct(UserRepositoryInterface $userRepository, 
    EncryptionInterface $encryptionService) 
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }
    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if($userDTO->getPassword() !== $confirmPassword){
            return false;
        }
        if(null !== $this->userRepository->findUserByUsername($userDTO->getUsername())){
            return false;
        }
        $plainPassword = $userDTO->getPassword();
        $hashPassword = $this->encryptionService->encryption($plainPassword);
        $userDTO->setPassword($hashPassword);
        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $userDB = $this->userRepository->findUserByUsername($username);
        if(null === $userDB){
            return null;
        }
        if(false === $this->encryptionService->verify($password, $userDB->getPassword())){
            return null;
        }
        return $userDB;
    }

    public function currentUser(): ?UserDTO
    {
        if(!$_SESSION['id']){
            return null;
        }
        return $this->userRepository->findUserById($_SESSION['id']);
    }

    public function isLogged(): bool
    {
        if(null === $this->currentUser()){
            return false;
        }
        return true;
    }

    public function edit(UserDTO $userDTO): bool
    {
        
        
        $plainPassword = $userDTO->getPassword();
        $hashPassword = $this->encryptionService->encryption($plainPassword);
        $userDTO->setPassword($hashPassword);

        return $this->userRepository->update($_SESSION['id'] ,$userDTO);
    }

    /**
     * @return \Genarator|UserDTO[]
     */
    public function getAll()
    {
        return $this->userRepository->findAll();
    }   
}