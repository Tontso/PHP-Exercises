<?php

namespace Services\Users;

use Data\Users\UserDTO;
use Exception;
use Services\Users\UserServiceInterface;
use Repositories\Users\UserRepositoryInterface;
use Services\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface
{

    const MIN_USER_LENGTH = 5;

    /**
     * @var UsersRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;


    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }


    public function register(UserDTO $userDTO)
    {
        if($userDTO->getPassword() != $userDTO->getConfirmPassword()){
            throw new Exception("Password mismatch");
        }

        if($userDTO->getUsername() < self::MIN_USER_LENGTH){
            throw new Exception("Username length is too short.");
        }

        $passwordHash = $this->encryptionService->hash($userDTO->getPassword());
        $userDTO->setPassword($passwordHash);
        $this->userRepository->register($userDTO);
    }

    public function verifyCredentials(string $username, string $password): bool
    {
        $user = $this->userRepository->getUserByName($username);

        return $this->encryptionService->verify($password, $user->getPassword());
    }
}