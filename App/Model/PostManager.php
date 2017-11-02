<?php

namespace App\Model;

use Framework\Manager;

class PostManager extends Manager
{
    public $db;
    
    public function __construct()
    {
        $this->db = parent::getDatabase();
    }
    
     public function add($params)
   {
     $postParams = $params['post'];
     var_dump($postParams);
     
     $sql = 'INSERT INTO post (datePost, titlePost, authorPost, descriptionPost) VALUE (NOW(), :titlePost, :authorPost, :descriptionPost)';
     $params = [':titlePost' => $postParams['titlePost'], ':authorPost' => $postParams['authorPost'], ':descriptionPost' => $postParams['description']];
     
     $this->db->execute($sql, $params);
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

      
  
      /*
      $q = $this->pdo->query('SELECT * FROM post WHERE id = '.$id);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      
      return new Post($donnees);
    */
      $data = $this->pdo->queryOne('SELECT * FROM post WHERE id = :id', [':id' => $id]);
  
      return new Post($data);
    
    }
 
    public function readAll($limit = 5)
    {
     // $sql = 'SELECT * FROM post ORDER BY date_post LIMIT 0,:limit';
     // $params = [':limit'=>$limit];
     
     $sql = 'SELECT * FROM post ORDER BY date_post DESC LIMIT 0,'.$limit;
     $params = [];
     
     $results = $this->pdo->query($sql,$params);
     
     $posts = [];
     
     foreach($results as $postData)
     {
     $posts[] = new Post($postData);
     }
     return $posts;
    }
   
    /**
     * 
     * @param Post $post objet de type Post
     * 
     * @return true en cas de succès ou false en cas d'erreur
     */
     public function update(Post $post)
     {
       $sql = 'UPDATE post SET date_post = NOW(), titre_post = :titre_post, auteur_post = :auteur_post, description = :description  WHERE id = :id LIMIT 1';
       $params = [':titre_post' => $post->getTitre_post(), ':auteur_post' => $post->getAuteur_post(), ':description' => $post->getDescription(), ':id' => $post->getId()];
       $this->pdo->execute($sql,$params);
     }
     
     /**
      * SUpprime un objet stocké en bdd
      * 
      * @param Post $post objet de type Post
      * 
      * @return true en cas de succès ou false en cas d'erreur
      */
      public function delete(Post $post)
      {
        $sql = 'DELETE FROM post WHERE id = :id LIMIT 1';
        $params = [':id' => $post->getId()];
        $this->pdo->execute($sql,$params);
      }
}
