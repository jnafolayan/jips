<?php

namespace app\core;

use app\utils\URI;

/**
 * @package app\core;
 */
class Router
{
    public array $routes = [];

    public function use($method, $path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }
    
    public function get($path, $callback)
    {
        $this->use('GET', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->use('POST', $path, $callback);
    }

    public function resolve() 
    {
        $path = URI::getPath($_SERVER['REQUEST_URI'] ?? '/');
        $method = $_REQUEST["REQUEST_METHOD"];
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            // TODO: return 404 page
            return;
        }

        call_user_func($callback);
    }
}

?>