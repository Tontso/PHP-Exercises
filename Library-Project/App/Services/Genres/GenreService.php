<?php

namespace App\Services\Genres;

use App\Repository\Genres\GenreRepositoryInterface;

class GenreService implements GenreServiceInterface
{

    /**
     * @var GenreRepositoryInterface
     */
    private $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository) {
        $this->genreRepository = $genreRepository;
    }

    public function getAll(): \Generator
    {
        return $this->genreRepository->getAll();
    }

    public function getGenreById($id)
    {
        return $this->genreRepository->getGenreById($id);
    }
}