<?php 

namespace App\Entity;

use DateTime;

class Post
{
    
    protected $idPost;
    protected $datePost;
    protected $titlePost;
    protected $authorPost;
    protected $descriptionPost;
    
    //-------------------------------------------
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    public function hydrate(array $donnees)
    {
        foreach($donnees as $key=>$value)
        {
            $method = 'set'.ucfirst($key);
            
            if(method_exists($this,$method))
            {
                $this->$method($value);
            }
        }
    }
    
    public function getId()
    {
        return $this->idPost;
    }
    
    public function setId($id)
    {
        $this->idPost = $id;
    }
    
    //-------------------------------------------
    
    public function getDatePost()
    {
        return $this->datePost;
    }
    
    public function setDatePost($date_post)
    {
        $this->datePost = new DateTime($date_post);
        return $this;
    }
    
    //-------------------------------------------
    
     public function getTitlePost()
    {
        return $this->titlePost;
    }
    
    public function setTitlePost($titre_post)
    {
        $this->titlePost = $titre_post;
        return $this;
    }
    
    //-------------------------------------------
   
    public function getAuthorPost()
    {
        return $this->authorPost;
    }
    
    public function setAuthorPost($auteur_post)
    {
        $this->authorPost = $auteur_post;
        return $this;
    }
    
    //-------------------------------------------
    
     public function getDescriptionPost()
    {
        return $this->descriptionPost;
    }
    
    public function setDescriptionPost($description)
    {
        $this->descriptionPost = $description;
        return $this;
    }
    
    public function donneesValides()
  {
    
    return !empty($this->titlePost) && !empty($this->authorPost) && !empty($this->descriptionPost);
  }
}