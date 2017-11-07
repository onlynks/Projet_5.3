<?php

namespace App\Model;

use Framework\Manager;

class PostManager extends Manager
{
    public static $db;
    
    public function __construct()
    {
        $this->db = parent::getDatabase();
    }
    
     public function add($param)
   {
     if(!empty($param['post']))
     {
     $postParams = $param['post'];
     
     $sql = 'INSERT INTO post (datePost, titlePost, authorPost, descriptionPost) VALUE (NOW(), :titlePost, :authorPost, :descriptionPost)';
     $params = [':titlePost' => $postParams['titlePost'], ':authorPost' => $postParams['authorPost'], ':descriptionPost' => $postParams['descriptionPost']];
     
     $this->db->execute($sql, $params);
     
     return 'Post ajouté avec succés!';
     }
     else
     {
         return 'Veuillez remplir tous les champs';
     }
   }
   
   /**
    * Recupère un objet Post à partir de son id
    * 
    * @param int $id Identifiant d'un post
    * 
    * @return bool/Post/null false si une erreure est subvenue, un objet Post di une correspondance est trouvée, Null s'il n'y a aucune correspondance
    */
    public function read($id)
    {
      $idPost = $id['id'];
      
      $query = $this->db->select('post', $idPost);
     
      $post = new \App\Entity\Post($query);
     
      
      return $post;
      
    }
 
    public function getList($params)
    {
     
     $query = $this->db->select('post',null,10);
     
     foreach($query as $post)
     {
     $posts[] = new \App\Entity\Post($post);
     
     }
     return $posts;
     
    }
   
    /**
     * 
     * @param Post $post objet de type Post
     * 
     * @return true en cas de succès ou false en cas d'erreur
     */
     public function update($params)
     {
         if(!empty($params['post']))
         {
           $id = $params['id'];
           $postParam = $params['post'];
           $sql = 'UPDATE post SET datePost = NOW(), titlePost = :titlePost, authorPost = :authorPost, descriptionPost = :descriptionPost  WHERE id = :id LIMIT 1';
           $params = [':titlePost' => $postParam['titlePost'], ':authorPost' => $postParam['authorPost'], ':descriptionPost' => $postParam['descriptionPost'], ':id' => $id];
           $this->db->execute($sql,$params);
           return 'Tous les changements ont été effectués avec succès!';
         }
         else
         {
         return 'Veuillez remplir tous les champs';  
         }
     }
     
     /**
      * SUpprime un objet stocké en bdd
      * 
      * @param Post $post objet de type Post
      * 
      * @return true en cas de succès ou false en cas d'erreur
      */
      public function delete($param)
      {
        $id = $param['id'];
        
        $sql = 'DELETE FROM post WHERE id = :id LIMIT 1';
        $params = [':id' => $id];
        $this->db->execute($sql,$params);
       }
}
