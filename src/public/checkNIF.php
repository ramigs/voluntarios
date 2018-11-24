<?php

session_start();

if (!isset($_SESSION['userId'])) {
    header ("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'database/Connection.php';
    require 'database/QueryBuilder.php';

    $nif = test_input($_POST["nif"]);
    
    $pdo = Connection::makePDO();

    $query = new QueryBuilder($pdo);
    $exists = $query->voluntarioByNIFExists($nif);

    $query = null;
    $pdo = null;

    echo $exists;

} else {
    header('Location: index.php');
    exit();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>