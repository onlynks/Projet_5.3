<?php

namespace Framework;

use PDO;

class Database
{
    public $pdo;
    
    public $dsn;
    public $user;
    public $password;
    public $option;
    
    public function __construct()
    {
     $this->hydrate();
     $this->pdo = new PDO($this->dsn, $this->user, $this->password, $this->option);
     
    }
    
    public function hydrate()
    {
        $this->dsn = \App\Config\Database::$dsn;
        $this->user = \App\Config\Database::$user;
        $this->password = \App\Config\Database::$password;
        $this->option = \App\Config\Database::$option;
    }
    
    public function select( $entity, $id = null, $quantity = null)
    {
        if($quantity !== null)
        {
            $query = $this->pdo->prepare("SELECT * FROM {$entity} LIMIT 0, {$quantity}");
            $query->execute();
            
            return $query->fetchAll();
        }
        else
        {
           $query = $this->pdo->prepare("SELECT * FROM {$entity} WHERE id= :id");
           $query->execute([':id'=> $id]);
            
           return $query->fetch(PDO::FETCH_ASSOC); 
        }
    }
    
    public function execute($sql, array $params = [])
    {
        $query = $this->pdo->prepare($sql);
        $oups = $query->execute($params);
    }
    
    
}


