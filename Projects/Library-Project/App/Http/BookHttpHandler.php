<?php

namespace App\Http;

use App\Data\BookDTO;
use App\Data\EditBookDTO;
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

    public function showMyBooks()
    {
        $allBooks = $this->bookService->getAllByUserId();
        $this->render("books/my-books", $allBooks);
    }

    public function showAllBooks()
    {
        $allBooks = $this->bookService->getAll();
        $this->render("books/all-books", $allBooks);
    }

    public function showBookView($getData = [])
    {
        $book = $this->bookService->getById($getData['id']);
        $this->render("books/view-book", $book);
    }

    public function deleteBook($getData = [])
    {
        $this->bookService->delete($getData['id']);
        $this->redirect("my-books.php");
    }

    public function editBook($formData, $getData = [])
    {
        if(isset($formData['edit'])){
            $currentUser = $this->userService->currentUser();
            $genre = $this->genreService->getGenreById($formData['genre_id']);
            /**
             * @var BookDTO $book
             */
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            $book->setUser($currentUser);
            $book->setGenre($genre);
            $this->bookService->edit(intval($getData['id']) ,$book);
            $this->redirect("my-books.php");
        } else {
            $book = $this->bookService->getById($getData['id']);
            $allGenres = $this->genreService->getAll();
            $editBook = new EditBookDTO();
            $editBook->setBookDTO($book);
            $editBook->setGenres($allGenres);
            $this->render("books/edit-book", $editBook);
        }
    }
}

