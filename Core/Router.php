<?php

namespace Core;

class Router
{
    protected $routes = [];

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
        // Extract path and query string from URI
        $uri_parts = parse_url($uri);
        $path = $uri_parts['path'];
        $query = $uri_parts['query'] ?? '';
    
        foreach ($this->routes as $route) {
            // Match on path and method only
            if ($route['uri'] === $path && $route['method'] === strtoupper($method)) {
                // Pass query string parameters as an associative array
                parse_str($query, $params);
    
                // Pass route parameters and query string parameters to controller
                $controller_path = base_path('controllers/' . $route['controller']);
                $controller = require $controller_path;
                return $controller($route['params'], $params);
            }
        }
    
        $this->abort();
    }
    
    

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
