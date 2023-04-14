<?php
require_once('vendor/autoload.php');
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// $routes = [
//     '/' => 'Controllers/index.php',
//     '/login' => 'Controllers/login.php',
//     '/profile' =>  'Controllers/profile.php',
//     '/users' => 'Controllers/user.php',
//     '/groups' => 'Controllers/group.php',
//     '/articles'=>'Controllers/article.php'
// ];

// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require $routes[$uri];
//     } else {
//         abort();
//     }
// }

// function abort($code = 404)
// {
//     http_response_code($code);
//     var_dump('NOT FOUND');
// }

// routeToController($uri, $routes);

// $_DB = new MySQLHandler("users");
// $_connect = $_DB->connect();
// $_DB -> save(['id'=>'2','user_name'=>'Rowan','user_email'=>'Rowan@gmail.com','user_mobile_number'=>'01001234024','user_username'=>'Rowan','user_password'=>'123456','subscription_date'=>'2022-11-11','group_id'=>'1']);
// $_DB -> get_all_records();
// var_dump($_DB -> get_all_records());



require_once 'Core/functions.php';
$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);