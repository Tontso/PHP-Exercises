<?php

namespace Controllers;

use Core\Services\Authentication\AuthenticationServiceInterface;
use Core\Services\Books\BookServiceInterface;
use Core\Services\Genres\GenreServiceInterface;
use DTO\BookDTO;
use DTO\NewBookForm;
use ViewEngine\ViewInterface;

class Books
{
    private $userAuth;

    /**
     * @var GenreServiceInterface
     */
    private $genreService;

    public function __construct(AuthenticationServiceInterface $userAuth, GenreServiceInterface $genreService) {
        $this->userAuth = $userAuth;
        $this->genreService = $genreService;
    }

    public function addBook(ViewInterface $view)
    {
        $allGenres =$this->genreService->getAll();
        $view->render($allGenres,'books/add_book');
    }

    public function addNewBookPost(BookServiceInterface $bookService, NewBookForm $bookDTO)
    {
        try{
            $currentUser = $this->userAuth->getCurrentUser();
            $genre = $this->genreService->getGenreById($bookDTO->getGenreId());
            $book = (new BookDTO())
                    ->setTitle($bookDTO->getTitle())
                    ->setAuthor($bookDTO->getAuthor())
                    ->setDescription($bookDTO->getDescription())
                    ->setImageURL($bookDTO->getImageURL())
                    ->setGenre($genre)
                    ->setUser($currentUser);
            $bookService->add($book);
            header("Location: /Custom-Framework/users/profile");
            exit;

        } catch(\Exception $ex){
            echo $ex->getMessage();
            exit;
        }
    }
}