<?php

namespace App\Repository\Books;

use App\Data\BookDTO;
use App\Repository\DatabaseAbstract;

class BookRepository extends DatabaseAbstract implements BookRepositoryInterface
{
    public function insert(BookDTO $bookDTO): bool
    {
            $this->db->query("
            INSERT INTO books (
                title, 
                author, 
                description, 
                image_url, 
                genre_id, 
                user_id) 
            VALUES(?, ?, ?, ?, ?, ?)
        ")
        ->execute([ 
            $bookDTO->getTitle(),
            $bookDTO->getAuthor(),
            $bookDTO->getDescription(),
            $bookDTO->getImageURL(),
            $bookDTO->getGenre()->getId(),
            $bookDTO->getUser()->getId(),
            ])
        ->fetch(BookDTO::class);
        return true;
    }

    public function update(BookDTO $bookDTO, int $id): bool
    {
            $this->db->query("
            UPDATE books 
                SET
                    title = ?, 
                    author = ?, 
                    description = ?, 
                    image_url = ?, 
                    genre_id = ?, 
                    user_id = ?, 
                WHERE  id = ? 
        ")
        ->execute([ 
            $bookDTO->getTitle(),
            $bookDTO->getAuthor(),
            $bookDTO->getDescription(),
            $bookDTO->getImageURL(),
            $bookDTO->getGenre()->getId(),
            $bookDTO->getUser()->getId(),
            $id
            ])
        ->fetch(BookDTO::class);
    return true;
    }

    public function delete(int $id): bool
    {
        return $this->db->query("
            DELETE FROM books WHERE id = ?
        ")
        ->execute([$id])
        ->fetch(BookDTO::class);
        return true;
    }

    public function getAll(): \Generator
    {
        
    }

    public function getBookById(int $id)
    {
        
    }

    public function getAllBooksByUser(int $id): \Generator
    {

    }

}