<?php

require_once(__DIR__.'/lib/dotenv.php');

load_envfile(__DIR__.'/.env');

class DB
{
    public static $connection;

    public static function getConnection()
    {
        $host = getenv("HOST");
        $user = getenv("USER");
        $pass = getenv("PASS");
        $dbname = getenv("DB_NAME");

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