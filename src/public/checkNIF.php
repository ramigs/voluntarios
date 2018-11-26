<?php

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['userId'])) {
    header ("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'database/Connection.php';
    require 'database/QueryBuilder.php';
    require 'Helper.php';

    $nif = Helper::test_input($_POST["nif"]);
    
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

?>