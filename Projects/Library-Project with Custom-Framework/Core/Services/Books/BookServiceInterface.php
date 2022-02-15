<?php

namespace Core\Services\Books ;

use DTO\BookDTO;

interface BookServiceInterface
{
    public function add(BookDTO $bookDTO): bool;

    public function edit(int $id, BookDTO $bookDTO): bool;

    public function delete(int $id): bool;

    public function getAll() :\Generator;

    public function getById(int $id): BookDTO;

    public function getAllByUserId(int $id): \Generator;
}