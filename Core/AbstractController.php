<?php

namespace Core;

use Core\DI\DI;

abstract class AbstractController
{
    protected $di;
    protected $view;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->view = $this->di->get('view');
    }
}