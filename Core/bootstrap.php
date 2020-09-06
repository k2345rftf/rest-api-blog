<?php
require_once __DIR__."/../vendor/autoload.php";
use Core\DI\DI;
use Core\FrontController;

$di = new DI();


$services = require_once __DIR__ . '/Config/services.php';

foreach ($services as $service){
    $provider = new $service($di);
    $provider->init();
}

$controller = new FrontController($di);

$controller->run();