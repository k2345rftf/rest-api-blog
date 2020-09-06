<?php

namespace Core\Source\Router;


class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [
            'GET'=>[],
            'POST'=>[]
        ];
    }

    public function addRoute($pattern, $controller, $method){
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    public function dispatch($uri, $method){
        $uri = $this->prepareUri($uri);
        $routes = $this->getRoutes($method);
        foreach ($routes as $pattern=>$controller){
            if (preg_match('~^'.$pattern.'$~',$uri)){
                $params = $this->getParams($uri);
                $controller = $routes[$pattern];
                return new RouteDispatched($controller, $params);
            }
        }

        return new RouteDispatched('ErrorController@page404');
    }

    private function prepareUri($uri){
        $uri = trim($uri);
        if($uri === '/'){
            return $uri;
        }
        return rtrim($uri,'/');
    }

    private function getParams($uri){
        $params = explode('/',$uri);
        $params = array_slice($params, 3);
        return $params;
    }

    private function getRoutes($method){
        return ($this->routes[strtoupper($method)])?$this->routes[strtoupper($method)]:[];
    }


}