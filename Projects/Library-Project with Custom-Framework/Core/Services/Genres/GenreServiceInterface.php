<?php

namespace Core\Services\Genres;


interface GenreServiceInterface
{
    public function getAll(): \Generator;

    public function getGenreById($id);
}