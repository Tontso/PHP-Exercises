<?php

namespace App\Http;

use App\Data\BookDTO;
use App\Services\Books\BookServiceInterface;
use App\Services\Genres\GenreServiceInterface;
use App\Services\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class BookHttpHandler extends HttpHandlerAbstract
{

    /**
     * @var BookServiceInterface
     */
    private $bookService;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var GenreServiceInterface
     */
    private $genreService;


    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                BookServiceInterface $bookService, 
                                UserServiceInterface $userService, 
                                GenreServiceInterface $genreService) 
    {
        parent::__construct($template, $dataBinder);
        $this->bookService = $bookService;
        $this->userService = $userService;
        $this->genreService = $genreService;
    }

    public function addNewBook(array $formData = [])
    {
        if(!$this->userService->isLogged()){
            $this->redirect("login.php");
            exit;
        }
        if(isset($formData['add'])){
            echo "Eimai edw";
            $this->addNewBookProcess($formData);
        } else {
            $this->render("books/add-book", $this->genreService->getAll());
        }
    }

    public function addNewBookProcess($formData)
    {
        try{
            $currentUser = $this->userService->currentUser();
            $genre = $this->genreService->getGenreById($formData['genre_id']);
            /**
             * @var BookDTO $book
             */
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            $book->setUser($currentUser);
            $book->setGenre($genre);
            $this->bookService->add($book);
            $this->redirect("my-profile.php");

        } catch(\Exception $ex){
            echo $ex->getMessage();
            exit;
        }
    }
}

