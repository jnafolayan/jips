<?php

class DB
{
    public static $connection;

    public static function getConnection()
    {
        $host = "localhost";
        $user = "root";
        $pass = "password";
        $dbname = "jips";

        if (!isset(self::$connection)) {
            $conn = new mysqli($host, $user, $pass, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            self::$connection = $conn;
        }

        return self::$connection;
    }
}

?>