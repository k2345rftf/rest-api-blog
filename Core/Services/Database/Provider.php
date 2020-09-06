<?php


namespace Core\Services\Database;

use Core\Services\AbstractProvider;
use Core\Source\Database\Database;

class Provider extends AbstractProvider
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function init()
    {

        $config = require_once ROOT . '/Core/Source/Database/Config/config.php';
        $this->di->set('db', new Database($config));
    }
}