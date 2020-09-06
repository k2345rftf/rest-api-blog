<?php

namespace Core\DI;

class DI
{

    private $container = [];

    public function __construct()
    {
    }

    public function set($name, $service){
        $this->container[$name] = $service;
        return $this;
    }

    public function get($name){
        if (isset($this->container[$name])){
            return $this->container[$name];
        }
        throw new \InvalidArgumentException(sprintf('This object not found!!!'));
    }

}