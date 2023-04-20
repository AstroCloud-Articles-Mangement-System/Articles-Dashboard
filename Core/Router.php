<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    public $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => []
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

    public function only($key = [])
    {
        foreach ($key as $middleware) {
            $this->routes[array_key_last($this->routes)]['middleware'][] = $middleware;
        }
        return $this;
    }


    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                foreach ($route['middleware'] as $val) {
                    Middleware::resolve($val);
                }
                return require base_path('Http/controllers/' . $route['controller']);
            } else {
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
