<?php

namespace App\Services\Genres;

use App\Data\GenreDTO;
use Generator;

interface GenreServiceInterface
{
    public function getAll(): \Generator;

    public function getGenreById($id);
}