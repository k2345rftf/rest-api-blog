<?php


namespace Core;


use Core\DI\DI;

abstract class AbstractModel
{
    protected $di;
    protected $db;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
    }
}