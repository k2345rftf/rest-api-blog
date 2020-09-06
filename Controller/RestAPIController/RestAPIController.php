<?php

namespace Controller\RestAPIController;

use Core\AbstractController;

class RestAPIController extends AbstractController
{

    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function GetPosts($id = null)
    {
        $model = new \Model\Posts\Posts($this->di);
        $params = ['json_obj'=> $model->select($id)];
        $this->view->render('show_are_got_data',$params);
    }

    public function GetComments($id = null)
    {
        echo 2,$id;
    }

    public function AddPosts($id, $text)
    {
        echo 3;
    }

    public function AddComments($id,$text)
    {
        echo 4;
    }
}