<?php

class Connection
{
    public static function makePDO()
    {
        require ('../resources/config.php');

        $host = $config["db"]["voluntarios"]["host"];
        $user = $config["db"]["voluntarios"]["username"];
        $password = $config["db"]["voluntarios"]["password"];
        $dbname = $config["db"]["voluntarios"]["dbname"];

        $options = [
            // Comment before PROD
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Comment before PROD
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $dsn = 'mysql:host=' . $host . ';' . 'dbname=' . $dbname . ';' . 'charset=utf8';

        return new PDO($dsn, $user, $password, $options);

    }

    public static function makeMySQLi()
    {
        require ('../resources/config.php');

        $host = $config["db"]["voluntarios"]["host"];
        $user = $config["db"]["voluntarios"]["username"];
        $password = $config["db"]["voluntarios"]["password"];
        $dbname = $config["db"]["voluntarios"]["dbname"];
        
        $conn = mysqli_connect($host, $user, $password, $dbname);

        return $conn;
    }
}

?>