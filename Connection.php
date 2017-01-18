<?php

class Connection
{
    public static $user = 'root';
    public static $password = 'root';
    public static $dbName = 'hotline_items';
    public static $dbPath = 'localhost';

    public  static function make()
    {
        try{
            return new PDO('mysql:host='.self::$dbPath.';dbname='.self::$dbName, self::$user, self::$password);
        }
        catch (PDOException $e){
            die("Error with Connection\n");
        }
    }

}