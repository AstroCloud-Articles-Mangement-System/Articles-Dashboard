<?php
require_once('config.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'Controllers/index.php',
    '/login' => 'Controllers/login.php',
    '/profile' =>  'Controllers/profile.php',
    '/users' => 'Controllers/user.php',
    '/groups' => 'Controllers/group.php',
    '/articles'=>'Controllers/article.php'
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    var_dump('NOT FOUND');
}

routeToController($uri, $routes);