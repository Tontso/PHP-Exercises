<?php

namespace Repository\Genres;


interface GenreRepositoryInterface
{
    public function getAll(): \Generator;
    public function getGenreById($id);
}