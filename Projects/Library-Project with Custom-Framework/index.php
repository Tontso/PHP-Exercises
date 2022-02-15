<?php declare(strict_types=1);

use Core\Application;
use Core\Http\Component\Session;
use Core\Http\Component\SessionInterface;
use Core\Mvc\MvcContext;
use Core\Services\Authentication\AuthenticationService;
use Core\Services\Authentication\AuthenticationServiceInterface;
use Core\Services\Books\BookService;
use Core\Services\Books\BookServiceInterface;
use Core\Services\Encryption\BCryptEncryptionService;
use Core\Services\Encryption\EncryptionServiceInterface;
use Core\Services\Genres\GenreService;
use Core\Services\Genres\GenreServiceInterface;
use Core\Services\Users\UserService;
use Core\Services\Users\UserServiceInterface;
use Driver\DatabaseInterface;
use Driver\PDODatabase;
use Driver\PDOPreparedStatement;
use Driver\PDOResultSet;
use Driver\ResultSetInterface;
use Driver\StatementInterface;
use Repository\Books\BookRepository;
use Repository\Books\BookRepositoryInterface;
use Repository\DataBinder\DataBinder;
use Repository\DataBinder\DataBinderInterface;
use Repository\Genres\GenreRepository;
use Repository\Genres\GenreRepositoryInterface;
use Repository\Users\UserRepository;
use Repository\Users\UserRepositoryInterface;
use ViewEngine\View;
use ViewEngine\ViewInterface;

spl_autoload_register();

session_start();

$uri = $_SERVER['REQUEST_URI'];
$self = explode("/", $_SERVER['PHP_SELF']);
$replace = implode("/", $self);
$uri = str_replace($replace."/", "", $uri);

$uriBeforeQuestionMark = explode('?', $uri);
$uri = $uriBeforeQuestionMark[0];
$params = explode("/", $uri);

$controllerName = array_shift($params);
var_dump($controllerName);
exit;
$actionName = array_shift($params);
if($actionName === null){
    $controllerName = 'Home';
    $actionName = 'home';
}

$mvcContext = new MvcContext($controllerName, $actionName, $params);
$app = new Application($mvcContext);

$app->addBean(
    DatabaseInterface::class, 
    new PDODatabase("localhost", "root", "", "library_db"));

$app->registerDependency(
    StatementInterface::class,
    PDOPreparedStatement::class
);

$app->registerDependency(
    ResultSetInterface::class,
    PDOResultSet::class
);

$app->addBean(
    SessionInterface::class, 
    new Session($_SESSION));

$app->registerDependency(
    ViewInterface::class, 
    View::class);

$app->registerDependency(
    EncryptionServiceInterface::class,
    BCryptEncryptionService::class
);

$app->registerDependency(
    AuthenticationServiceInterface::class, 
    AuthenticationService::class);

/* ----------> Servicies <---------- */
$app->registerDependency(
    UserServiceInterface::class,
    UserService::class
);

$app->registerDependency(
    GenreServiceInterface::class,
    GenreService::class
);

$app->registerDependency(
    BookServiceInterface::class,
    BookService::class
);

/* ----------> Repositories <---------- */
$app->registerDependency(
   UserRepositoryInterface::class,
   UserRepository::class
);

$app->registerDependency(
    GenreRepositoryInterface::class,
    GenreRepository::class    
);

$app->registerDependency(
    BookRepositoryInterface::class,
    BookRepository::class
);

$app->registerDependency(
    DataBinderInterface::class,
    DataBinder::class
);

$app->start();



