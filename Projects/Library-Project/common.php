<?php

session_start();
spl_autoload_register();

use App\Http\BookHttpHandler;
use App\Http\UserHttpHandler;
use App\Repository\Books\BookRepository;
use App\Repository\Genres\GenreRepository;
use App\Repository\UserRepository;
use App\Services\Books\BookService;
use App\Services\Encryption\ArgonService;
use App\Services\Genres\GenreService;
use App\Services\UserService;
use Core\DataBinder;
use Core\Template;
use Database\PDODatabase;

$template = new Template();
$dataBinder = new DataBinder();

$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new PDODatabase($pdo);

$userRepository = new UserRepository($db, $dataBinder);
$genreRepository = new GenreRepository($db, $dataBinder);
$bookRepository = new BookRepository($db, $dataBinder);

$enctyprion = new ArgonService();
$userService = new UserService($userRepository, $enctyprion);
$bookSerive = new BookService($bookRepository, $userService);
$genreService = new GenreService($genreRepository);

$userHttpHander = new UserHttpHandler($template, $dataBinder);

$bookHttpHandler = new BookHttpHandler($template, 
                                       $dataBinder, 
                                       $bookSerive,
                                       $userService,
                                       $genreService);
