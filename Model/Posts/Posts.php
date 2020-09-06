<?php


namespace Model\Posts;
use Core\AbstractModel;
use Core\DI\DI;

class Posts extends AbstractModel
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
    }

    public function select($id = null){
        $params = [];
        if (is_null($id)){
            $sql = 'SELECT * FROM `posts`';


        }else{
            $sql = 'SELECT * FROM `posts` WHERE id = ?';
            $params[]=$id;
        }
        return $this->db->select($sql,$params);

    }
    public function insert($login, $text){
        $sql = 'INSERT INTO posts ($login, $text) VALUES (?,?)';
        $params['login']=$login;
        $params['text']=$text;

        $this->db->insert($sql,$params);
    }
}