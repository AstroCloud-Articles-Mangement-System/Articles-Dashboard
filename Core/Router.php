<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    public $routes = [];
        // Define the allowed roles for each route
    protected  $allowedRoles = [
            '/' => ['admin','editor','user'],
            '/users' => ['admin'],
            '/users/create' => ['admin'],
            '/users/edit' => ['admin'],
            '/groups' => ['admin'],
            '/groups/create' => ['admin'],
            '/groups/edit' => ['admin'],
            '/articles' => ['admin', 'editor'],
            '/articles/create' => ['admin', 'editor'],
            '/articles/show' => ['admin', 'editor', 'user'],
            '/profile' => ['admin', 'editor', 'user'],
            '/login' => ['admin', 'editor', 'user'],
            '/logout' => ['admin', 'editor', 'user'],
        ];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {    
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);
                if (isset($_SESSION['user']) && !(in_array($_SESSION['user']['role'], $this->allowedRoles[$route['uri']]))) {
                    $this->abort(403);
                }else{
                    return require base_path('controllers/' . $route['controller']);
                }
            }else{
               
            }
        }
       
        
            $this->abort(404);
        

    }


    public function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/pages/errors/{$code}.php");

        die();
    }

}