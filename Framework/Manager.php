<?php

namespace Framework;

class Manager
{
    public static $db;
    
    public static function getDatabase()
    {
        $database = new Database();
        self::$db = $database;
        return self::$db;
    }
}

