<?php

namespace Framework;

class Router
{
    public static $routes = [];
    
    
    public static function hydrate( $routesAdded = [])
    {
        self::$routes = $routesAdded;
    }
    
    public static function matchAndDispatch()
    {
        if(!empty($_GET || $_POST))
        {
           //Swap to associative array and define params
           $CurrentRouteShortcut = array('action' => $_GET['action'], 'entity' => $_GET['entity']);
           $params = array('post'=> $_POST, 'id'=> $_GET['id']);
           
           if(in_array($CurrentRouteShortcut,self::$routes))
           {
              $controllerClass = 'App\Controller\\' . ucfirst($_GET['entity']) . 'Controller';
              return new $controllerClass($_GET['action'],$params);
              
           }
           else
           {
               View::erreur();
           }
        }
        else 
        {
            $loader = new \Twig_Loader_Filesystem(APP_PATH . '/App/View');
            $twig = new \Twig_Environment($loader, array('cache' => false, 'debug' => true,));
            $view = View::getPage('homepage');
            
            foreach( $view as $element )
            {
               echo $twig->render($element);
            }
        }
    }
}

