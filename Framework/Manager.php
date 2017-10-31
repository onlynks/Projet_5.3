<?php

namespace Framework;

class Manager
{
    public static $db;
    
    public function __construct()
    {
        $database = new Database();
        self::$db = $database->pdo;
    }
}

