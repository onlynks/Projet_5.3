<?php

namespace App\Controller;

use Framework\Controller;
use App\Model\PostManager;

class PostController extends Controller
{
    public function __construct($action, $params)
    {
        $this->reorientation($action);
        parent::hydrate($action, $params);
        $post = $this->getModele();
        $coms = $this->checkDependence( $action ,$params );
        
        $loader = new \Twig_Loader_Filesystem(APP_PATH . '/App/View');
        $twig = new \Twig_Environment($loader, array('cache' => false, 'debug' => true,));
        
        $page = $this->getView($action);
        
        if(isset($page))
        {
            foreach( $page as $element )
            {
               echo $template = $twig->render($element, array('post' => $post, 'coms' => $coms));
            }
        }
        else
        {
            header('Location: index.php?action=getList&entity=post');
        }
    }
    
    public function getModele()
    {
        $action = parent::$action;
        $params = parent::$params;
        
        $postVariable = $params['post'];
        
        if(isset($postVariable['authorCom'], $postVariable['contentCom']))
        {
          $coms = new \App\Model\ComManager();
          $coms->add($params);
          
        }
        
        $actionManager = new PostManager();
        return $actionManager->$action($params);
        
        
        
    }
    
    public function getView($action)
    {
        return $page = \Framework\View::getPage($action.'Post');
    }
    
    public function checkDependence( $action, $params = null )
    {
       $dependence = \App\Config\Routes::checkDependence('post', $action);
       
       if($dependence != null)
       {
           $managerClass = '\App\Model\\' .ucfirst($dependence['entity']) . 'Manager';
           $dependenceManager =  new $managerClass();
           r($params);
           return $dependenceManager->$dependence['action']($params);
       }
    }
    
    public function reorientation($action)
    {
        if($action == 'add')
        {
            header('index.php?action=getList&entity=post');
        }
    }
    
}