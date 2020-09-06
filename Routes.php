<?php
$this->router->addRoute('/','MainController@index', 'GET');

$this->router->addRoute('/api/posts','RestAPIController@getPosts', 'GET');
$this->router->addRoute('/api/posts/[0-9]+','RestAPIController@getPosts', 'GET');
$this->router->addRoute('/api/posts','RestAPIController@getPosts', 'POST');

$this->router->addRoute('/api/comments/[0-9]*','RestAPIController@GetComments', 'GET');
$this->router->addRoute('/api/comments','RestAPIController@GetComments', 'POST');
