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
     //7
       array(
            'entity'=>'com',
            'action'=>'delete',
             ),
             
        
     );
     
     public static $dependence = array(3 => 6, 1 => 7);
     
     public static function checkDependence($entity, $action)
     {
      $view = 
      array('entity' => $entity,
            'action' => $action
            );
      
      for($i = 0; $i <= 10; $i++) 
         {
           if($view == self::$routes[$i])
           {
            $try = array_search(self::$routes[$i], self::$routes);
            
            $result = self::$routes[self::$dependence[$try]];
            
            return $result;
           }
         }
     }
}