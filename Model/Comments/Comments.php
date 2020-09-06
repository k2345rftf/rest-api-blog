<?php


namespace Model\Comments;
use Core\AbstractModel;
use Core\DI\DI;



class Comments extends AbstractModel
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }
}