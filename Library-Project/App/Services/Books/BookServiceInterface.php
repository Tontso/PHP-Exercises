<?php

namespace App\Services\Books;

use App\Data\BookDTO;

interface BookServiceInterface
{
    public function add(BookDTO $bookDTO): bool;

    public function edit(BookDTO $bookDTO): bool;

    public function delete(int $id): bool;

    public function getAll() :\Generator;

    public function getById(int $id): BookDTO;

    public function getAllByUserId(): \Generator;
}