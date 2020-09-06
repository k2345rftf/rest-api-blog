<?php

namespace Core;
class FrontController
{
    private $di;
    private $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');

    }

    public function run(){
        require_once ROOT."/Routes.php";
        $dispatched_route = $this->router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        list($controller, $action) = explode('@',$dispatched_route->getController());
        $class = '\\Controller\\' . $controller . '\\' . $controller;
        call_user_func_array([new $class($this->di), $action],$dispatched_route->getParams());
    }

}