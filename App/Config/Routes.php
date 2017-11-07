<?php
namespace App\Config;

class Routes
{
    public static $routes = array(
     //0
        array(
            'entity'=>'post',
            'action'=>'add',
             ),
     //1       
       array(
            'entity'=>'post',
            'action'=>'delete',
             ),
     //2
       array(
            'entity'=>'post',
            'action'=>'getList',
             ),
     //3
       array(
            'entity'=>'post',
            'action'=>'read',
             ),
     //4
       array(
            'entity'=>'post',
            'action'=>'update',
             ),
     //5
       array(
            'entity'=>'com',
            'action'=>'add',
             ),
     //6
       array(
            'entity'=>'com',
            'action'=>'getList',
             ),
             
        
     );
     
     public static $dependence = array(3 => 6);
     
     public static function checkDependence($entity, $action)
     {
      $view = 
      array('entity' => $entity,
            'action' => $action
            );
      
      //define the route to match with
       $route = key(self::$dependence);
       
       //check if the current route match and return either the dependence or null
       if($view == self::$routes[$route])
       {
       $return = self::$dependence[$route];
       
       return self::$routes[$return];
       }
       else
       {
        return null;
       }
     }
}