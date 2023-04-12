<?php 
require_once('config.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// // Remove the folder path if it exists
// $uri = str_replace(URL_BASE, '/', $uri);


// $uri = $_SERVER['REQUEST_URI'];

// // Remove the base URL path if it exists
// $uri = str_replace(URL_BASE, '', $uri);
// die($uri);

$routes = [
    '/' => 'controllers/index.php',
    '/users' => 'controllers/user.php',
    '/charts' => 'controllers/chart.php',





    '/login' => 'controllers/login.php',
];

function routeToController($uri,$routes){
    if(array_key_exists($uri,$routes)){
        require $routes[$uri];
    } else{
        abort();
    }
}

function abort($code=404){
    http_response_code($code);
    var_dump('not found');
}

routeToController($uri,$routes);
?>