<?php


namespace App\Database;


class Database
{
    private static $conn = null;

    public static function connect()
    {
        $secrets = require __DIR__ . "./../../config/secrets.php";

        self::$conn = new \mysqli('localhost', $secrets['user'], $secrets['password'], $secrets['db_name']);

        if(mysqli_connect_errno()){
            // TODO throw an exception
            echo 'DB connection error';
            exit;
        }
        return self::$conn;
    }
}
