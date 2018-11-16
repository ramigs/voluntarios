<?php

class Connection
{
    public static function make()
    {
        // PDO
        $host = "localhost";
        $user = "webapp";
        $password = "UNvHL8Q8";
        $dbname = "voluntarios";

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