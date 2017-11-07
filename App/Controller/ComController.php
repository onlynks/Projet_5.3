<?php

namespace App\Controller;

use Framework\Controller;
use App\Model\ComManager;

class ComController extends Controller
{
    public function __construct($action, $params)
    {
        parent::hydrate($action, $params);
        $this->getView($action);
        $this->execute();
        
    }
    
    public function execute()
    {
        $Manager = new ComManager(parent::$action . 'Com',parent::$params);
    }
    
    public function getView($action)
    {
        include __DIR__.'/../View/'.$action . 'Post.html';
    }
    
}