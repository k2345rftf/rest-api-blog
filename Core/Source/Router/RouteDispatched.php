<?php

namespace Core\Source\Router;

class RouteDispatched
{
    private $controller;
    private $params;

    public function __construct($controller, array $params = [])
    {
        $this->params = $params;
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}