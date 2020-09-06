<?php


namespace Core\Services\View;

use Core\Services\AbstractProvider;
use Core\Source\View\View;


class Provider extends AbstractProvider
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function init()
    {
        $this->di->set('view', new View());
    }
}