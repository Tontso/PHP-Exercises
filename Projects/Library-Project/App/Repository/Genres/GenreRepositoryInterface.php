<?php

namespace App\Repository\Genres;

use App\Data\GenreDTO;

interface GenreRepositoryInterface
{
    public function getAll(): \Generator;
    public function getGenreById($id);
}