<?php 

namespace App\Entity;

class Com
{
    
    protected $id;
    protected $idPostCom;
    protected $authorCom;
    protected $dateCom;
    protected $contentCom;
    
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
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    //-------------------------------------------
    
    public function getIdPostCom()
    {
        return $this->idPostCom;
    }
    
    public function setIdPostCom($id_post)
    {
        $this->idPostCom = $id_post;
        return $this;
    }
    
    //-------------------------------------------
    
     public function getAuthorCom()
    {
        return $this->authorCom;
    }
    
    public function setAuthorCom($auteur_com)
    {
        $this->authorCom = $auteur_com;
        return $this;
    }
    
    //-------------------------------------------
   
    public function getDateCom()
    {
        return $this->dateCom;
    }
    
    public function setDateCom($date_com)
    {
        $this->dateCom = $date_com;
        return $this;
    }
    
    //-------------------------------------------
    
     public function getContentCom()
    {
        return $this->contentCom;
    }
    
    public function setContentCom($com)
    {
        $this->contentCom = $com;
        return $this;
    }
    
    public function donneesValides()
  {
    
    return !empty($this->contentCom) && !empty($this->authorCom) && !empty($this->contentCom);
  }
}