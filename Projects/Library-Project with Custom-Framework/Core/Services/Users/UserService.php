<?php

namespace Core\Services\Users;

use Core\Services\Encryption\EncryptionServiceInterface;
use DTO\UserDTO;
use Repository\Users\UserRepositoryInterface;

class UserService implements UserServiceInterface
{   
    /**
     * @var UserRepositoryInterface 
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface $encryptionService
     */
    private $encryptionService;

    public function __construct(UserRepositoryInterface $userRepository, 
    EncryptionServiceInterface $encryptionService) 
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }
    
    public function register(UserDTO $userDTO): bool
    {
        if(null !== $this->userRepository->findUserByUsername($userDTO->getUsername())){
            return false;
        }
        $plainPassword = $userDTO->getPassword();
        $hashPassword = $this->encryptionService->encrypt($plainPassword);
        $userDTO->setPassword($hashPassword);
        return $this->userRepository->insert($userDTO);
    }


    /**
     * @deprecated not implemet right yet!!
     */
    public function edit(UserDTO $userDTO): bool
    {
        /**
         * TODO
         */
        
        $plainPassword = $userDTO->getPassword();
        $hashPassword = $this->encryptionService->encrypt($plainPassword);
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