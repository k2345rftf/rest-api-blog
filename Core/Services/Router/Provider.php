<?php


namespace Core\Services\Router;

use Core\Services\AbstractProvider;
use Core\Source\Router\Router;


class Provider extends AbstractProvider
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function init()
    {
        $this->di->set('router', new Router());
    }
}