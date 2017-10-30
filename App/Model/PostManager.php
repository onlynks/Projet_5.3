<?php

namespace App\Model;

class PostManager
{
    public $bdd;
    
    public function __construct($action, $params, \Framework\Database $pdo)
    {
        echo $action . ', '. $params;
        $this->bdd = $pdo;
    }
}