<?php

use Phroute\Phroute\RouteCollector;


$router = new RouteCollector();

//$router->any('/', function(){
//    return 'Hello word';
//});


$router->controller('/', 'App\Controller\Home');
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
echo $dispatcher->dispatch('GET', '/');


