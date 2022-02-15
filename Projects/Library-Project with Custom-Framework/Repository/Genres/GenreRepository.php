<?php

namespace Repository\Genres;

use DTO\GenreDTO;
use Driver\DatabaseInterface;

class GenreRepository implements GenreRepositoryInterface
{

    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function getAll(): \Generator
    {
        return $this->db->query("
            SELECT id, name
            FROM genres
        ")
        ->execute()
        ->fetch(GenreDTO::class);
    }

    public function getGenreById($id) 
    {
        return $this->db->query("
            SELECT id, name
            FROM genres
            WHERE id = ?
        ")
        ->execute([$id])
        ->fetch(GenreDTO::class)
        ->current();
    }
}