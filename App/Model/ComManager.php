<?php

namespace App\Model;

use Framework\Manager;

class ComManager extends Manager
{
    public static $db;
    
    public function __construct()
    {
        $this->db = parent::getDatabase();
    }
    
    public function getList($params)
    {
        
        $idPostCom = $params['id'];
        
        $list = $this->db->pdo->prepare("SELECT * FROM com WHERE idPostCom = :idPostCom LIMIT 0, 20");
        $list->execute(['idPostCom' => $idPostCom]);
        $results = $list->fetchAll();
        
        foreach($results as $comData)
        {
            $coms[] = new \App\Entity\Com($comData);
        }
        return $coms;
       
    }
    
    public function add($param)
    {
     $comParams = $param['post'];
     
     $idPostCom = $param['id'];
     
     $sql = 'INSERT INTO com (dateCom, idPostCom, authorCom, contentCom) VALUE (NOW(), :idPostCom, :authorCom, :contentCom)';
     $params = ['idPostCom' => $idPostCom, ':authorCom' => $comParams['authorCom'], ':contentCom' => $comParams['contentCom']];
     
     $this->db->execute($sql, $params);
    }
    
    public function delete($param)
    {
        $id = $param['id'];
        
        $sql = 'DELETE FROM com WHERE idPostCom = :id LIMIT 1';
        $params = [':id' => $id];
        $this->db->execute($sql,$params);
    }
    
    
}