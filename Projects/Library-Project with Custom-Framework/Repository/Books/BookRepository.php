<?php

namespace Repository\Books;

use Driver\DatabaseInterface;
use DTO\BookDTO;
use DTO\GenreDTO;
use DTO\UserDTO;
use Repository\Books\BookRepositoryInterface;
use Repository\DataBinder\DataBinderInterface;

class BookRepository implements BookRepositoryInterface
{

    private $db;
    private $dataBinder;

    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder) {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

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
                    user_id = ? 
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
        $this->db->query("
            DELETE FROM books WHERE id = ?
        ")
        ->execute([$id])
        ->fetch(BookDTO::class);
        return true;
    }

    public function getAll(): \Generator
    {
        $lazyBookResult = $this->db->query("
            SELECT
                b.id AS bookId,
                b.title, 
                b.author, 
                b.description, 
                b.image_url AS imageURL, 
                b.genre_id, 
                b.user_id,
                b.added_on AS addedOn,
                g.id AS genreId,
                g.name,
                u.id AS userId,
                u.username,
                u.full_name as fullName,
                u.born_on as bornOn
            FROM books as b
            INNER JOIN genres AS g ON b.genre_id = g.id
            INNER JOIN users AS u ON b.user_id = u.id
            ORDER BY b.added_on DESC
        ")
        ->execute()
        ->fetch();
        
        foreach($lazyBookResult as $row){
            $book = $this->dataBinder->bind($row, BookDTO::class);
            $genre = $this->dataBinder->bind($row, GenreDTO::class);
            $user = $this->dataBinder->bind($row, UserDTO::class);
            $genre->setId($row['genreId']);
            $user->setId($row['userId']);
            $book->setId($row['bookId']);
            $book->setUser($user);
            $book->setGenre($genre);

            yield $book;
        }
    }

    public function getBookById(int $id): BookDTO
    {
        $row = $this->db->query("
            SELECT
                b.id AS bookId,
                b.title, 
                b.author, 
                b.description, 
                b.image_url AS imageURL, 
                b.genre_id, 
                b.user_id,
                b.added_on AS addedOn,
                g.id AS genreId,
                g.name,
                u.id AS userId,
                u.username,
                u.full_name as fullName,
                u.born_on as bornOn
            FROM books as b
            INNER JOIN genres AS g ON b.genre_id = g.id
            INNER JOIN users AS u ON b.user_id = u.id
            WHERE b.id = ?
        ")
        ->execute([$id])
        ->fetch()
        ->current();
        
        $book = $this->dataBinder->bind($row, BookDTO::class);
        $genre = $this->dataBinder->bind($row, GenreDTO::class);
        $user = $this->dataBinder->bind($row, UserDTO::class);
        $genre->setId($row['genreId']);
        $user->setId($row['userId']);
        $book->setId($row['bookId']);
        $book->setUser($user);
        $book->setGenre($genre);

        return $book;
        
    }

    public function getAllBooksByUser(int $id): \Generator
    {
        $lazyBookResult = $this->db->query("
            SELECT
                b.id AS bookId,
                b.title, 
                b.author, 
                b.description, 
                b.image_url AS imageURL, 
                b.genre_id, 
                b.user_id,
                b.added_on AS addedOn,
                g.id AS genreId,
                g.name,
                u.id AS userId,
                u.username,
                u.full_name as fullName,
                u.born_on as bornOn
            FROM books as b
            INNER JOIN genres AS g ON b.genre_id = g.id
            INNER JOIN users AS u ON b.user_id = u.id
            WHERE b.user_id = ?
            ORDER BY b.added_on DESC
        ")
        ->execute([$id])
        ->fetch();
        
        foreach($lazyBookResult as $row){
            $book = $this->dataBinder->bind($row, BookDTO::class);
            $genre = $this->dataBinder->bind($row, GenreDTO::class);
            $user = $this->dataBinder->bind($row, UserDTO::class);
            $genre->setId($row['genreId']);
            $user->setId($row['userId']);
            $book->setId($row['bookId']);
            $book->setUser($user);
            $book->setGenre($genre);

            yield $book;
        }
    }

}