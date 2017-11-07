<?php

namespace App\Config;

use PDO;

class Database

{
    public static $dsn ='mysql:host=127.0.0.1;dbname=blog_projet5;charset=utf8';
    public static $user ='onlynks';
    public static $password ='';
    public static $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
}


