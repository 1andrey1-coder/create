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
    //state
    $r->addRoute('GET', 'article/', ['App\FrontEndController','articleList']);
    $r->addRoute('GET', 'article/(:num)', ['App\FrontEndController ','contentArticle']);
    // admin
    $r->addRoute('GET', '/admin', ['App\BackEndController','showAdminPanel']);
    $r->addRoute('POST', '/admin', ['App\BackEndController','Login']);
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
