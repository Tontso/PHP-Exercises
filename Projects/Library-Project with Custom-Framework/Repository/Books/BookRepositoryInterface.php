<?php

namespace Repository\Books;


use DTO\BookDTO;

interface BookRepositoryInterface
{
    public function insert(BookDTO $bookDTO): bool;
    public function update(BookDTO $bookDTO, int $id): bool;
    public function delete(int $id): bool;
    public function getAll(): \Generator;
    public function getBookById(int $id);
    public function getAllBooksByUser(int $id): \Generator;
}