<?php

namespace Core\Source\Database;
use PDO;

class Database
{

    private $db;

    public function __construct($config)
    {
        $dsn = $config['type'].':dbname='.$config['name'].';host = '.$config['host'].';charset = '.$config['charset'];

        $this->db = new PDO($dsn, $config['login'], $config['password'], $config['options']);
    }

    public function insert($sql, $params){
        try{
            return $this->query($sql, $params);
        }catch (\PDOException $e){
            echo '<pre>',$e->getMessage(),'</pre>';
            die();
        }
    }

    public function select($sql, $params){
        try{
            $rez = $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
            if (count($rez) == 1){
                return $rez[0];
            }
            return $rez;
        }catch (\PDOException $e){
            echo '<pre>',$e->getMessage(),'</pre>';
            die();
        }
    }

    private function query($sql, $params){
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key=>$param){
            $stmt->bindParam($key+1,$param);
        }
        $stmt->execute();
        return $stmt;
    }

}