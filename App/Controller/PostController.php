<?php

namespace App\Controller;

use Framework\Controller;
use App\Model\PostManager;

class PostController extends Controller
{
    public function __construct($action, $params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {  
            $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
            $_SESSION['token'] = $token;
        }

        $this->reorientation($action);
        parent::hydrate($action, $params);
        $post = $this->getModele();
        $coms = $this->checkDependence( $action ,$params);
        
        $loader = new \Twig_Loader_Filesystem(APP_PATH . '/App/View');
        $twig = new \Twig_Environment($loader, array('cache' => false, 'debug' => true,));
        $twig->addGlobal('get', $_GET);
        
        $page = $this->getView($action);
        
        if(isset($page))
        {
            foreach( $page as $element )
            {
               echo $template = $twig->render($element, array('post' => $post, 'coms' => $coms, 'token' =>  $_SESSION['token']));
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
            if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
            {
                // On vérifie que les deux correspondent
                if ($_SESSION['token'] == $_POST['token']) 
                {
                $coms = new \App\Model\ComManager();
                $coms->add($params);
                }
            }
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