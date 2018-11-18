<?php

class Connection
{
    public static function make()
    {

        require ('../resources/config.php');

        // PDO
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

        $dsn = 'mysql:host=' . $host . ';' . 'dbname=' . $dbname;

        return new PDO($dsn, $user, $password, $options);

    }
}

?>