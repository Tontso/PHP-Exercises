<?php

namespace Core\Services\Authentication;

use Core\Http\Component\SessionInterface;
use Core\Services\Encryption\EncryptionServiceInterface;
use DTO\UserDTO;
use Repository\Users\UserRepositoryInterface;

class AuthenticationService implements AuthenticationServiceInterface
{
    const KEY_SESSION_USER_ID = 'auth_id';
    
    private $session;
    private $userRepository;
    private $encryptionService;

    public function __construct(SessionInterface $session, 
                                UserRepositoryInterface $userRepository, 
                                EncryptionServiceInterface $encryptionService) {
        $this->session = $session;
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    public function isLogged(): bool
    {
        return !empty($this->session->getAttribute(self::KEY_SESSION_USER_ID));
    }

    public function getCurrentUser(): ?UserDTO
    {
        return $this->userRepository->findUserById($this->session->getAttribute(self::KEY_SESSION_USER_ID));
    }

    public function login($username, $password): bool
    {
        $userDB = $this->userRepository->findUserByUsername($username);
        if(null === $userDB){
            return null;
        }

        if($this->encryptionService->verify($password, $userDB->getPassword())){
            $this->session->setAttribute(self::KEY_SESSION_USER_ID, $userDB->getId());
            return true;
        }
        return false;
    }
}