<?php

namespace App\Repository\Genres;

use App\Data\GenreDTO;
use App\Repository\DatabaseAbstract;

class GenreRepository extends DatabaseAbstract implements GenreRepositoryInterface
{
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