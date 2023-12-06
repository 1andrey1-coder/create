<?php
session_start();

require_once 'vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

$bootstrap = require __DIR__ . '/App/bootstrap.php';
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r)
{
    //Log
    $r->addRoute('GET', '/', ['App\FrontEndController','LoginView' ]);
    //login
    $r->addRoute('POST', '/login', ['App\BackEndController','Login']);
    //xtn
    $r->addRoute('GET', '/pdo', ['App\PDOFrontEntControler','Pdoi']);
    $r->addRoute('GET', '/pdo/{id}', ['App\PDOFrontEntControler','PdoOne']);
    //state
    $r->addRoute('GET', '/layout', ['App\FrontEndController','articleList']);
    $r->addRoute('GET', '/article/{id}', ['App\FrontEndController','contentArticle']);
    // admin
    $r->addRoute('GET', '/admin', ['App\BackEndController','showAdminPanel']);
    $r->addRoute('GET', '/admin/add', ['App\BackEndController','ShowAdd']);
    $r->addRoute('GET', '/admin/save/{id}', ['App\BackEndController','save']);
    $r->addRoute('GET', '/admin/edit/(:num)', ['App\BackEndController','EditStat']);

});
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


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
