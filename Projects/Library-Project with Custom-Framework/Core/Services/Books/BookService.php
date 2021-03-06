<?php


namespace Core\Services\Books;

use Core\Services\Users\UserServiceInterface;
use DTO\BookDTO;
use Repository\Books\BookRepositoryInterface;

class BookService implements BookServiceInterface
{

    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(BookRepositoryInterface $bookRepository, UserServiceInterface $userService) {
        $this->bookRepository = $bookRepository;
        $this->userService = $userService;
    }

    public function add(BookDTO $bookDTO): bool
    {
        return $this->bookRepository->insert($bookDTO);
    }

    public function edit(int $id, BookDTO $bookDTO): bool
    {
        return $this->bookRepository->update($bookDTO, $id);
    }

    public function delete(int $id): bool
    {
        return $this->bookRepository->delete($id);
    }

    public function getAll() :\Generator
    {
        return $this->bookRepository->getAll();
    }

    public function getById(int $id): BookDTO
    {
        return $this->bookRepository->getBookById($id);
    }

    public function getAllByUserId(int $id): \Generator
    {
        return $this->bookRepository->getAllBooksByUser($id);
    }
}