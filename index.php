<?php
session_start();
//declare(strict_types=1);
require_once 'vendor/autoload.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
//$path = $_SERVER['DOCUMENT_ROOT'];



//use NoahBuscher\Macaw\Macaw;
//use Tracy\Debugger;



$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



//Macaw::get('/', 'App\FrontEndController@LoginView');
////Macaw::get( '/', 'App\FrontEndController@articleList');
//Macaw::get('article/(:num)', 'App\FrontEndController@contentArticle');
//Macaw::get('/admin', 'App\BackEndController@LoginView');
//Macaw::get('/admin ', 'App\BackEndController@showAdminPanel');
//Macaw::post('/admin', 'App\BackEndController@Login');
//Macaw::get( '/src/View', 'App\BackEndController@LoginObrat');
//Macaw::get( 'view/(:num)', 'App\Demo@view');
//Macaw::dispatch();


//
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();



use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;
//require 'create/template/vendor/autoload.php';
$bootstrap = require __DIR__ . '/App/bootstrap.php';
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    //Log
    $r->addRoute('GET', '/', ['App\FrontEndController','LoginView' ]);
    //state
//    $r->addRoute('GET', '/', ['App\FrontendController','articleList']);
    $r->addRoute('GET', 'article/(:num)', ['App\FrontEndController ','contentArticle']);
    // admin
    $r->addRoute('GET', '/admin', ['App\BackEndController','showAdminPanel']);
    $r->addRoute('POST', '/admin', ['App\BackEndController','Login']);
});
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $routeInfo[1];
        $parameters = $routeInfo[2];
// ... call $handler with $vars
        $bootstrap->call($controller, $parameters);
        break;
}

?>
