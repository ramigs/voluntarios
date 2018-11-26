<?php

session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit;
}

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// If request came from 'index.php'
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['voluntarioId'])) {

    require 'database/Connection.php';
    require 'database/QueryBuilder.php';
    require 'Voluntario.php';
    require 'Helper.php';

    $voluntarioId = Helper::test_input($_POST["voluntarioId"]);


    $pdo = Connection::makePDO();

    $query = new QueryBuilder($pdo);
    $voluntario = $query->selectVoluntarioById($voluntarioId);

    $acoesVoluntario = $query->selectParticipacoesVoluntario($voluntarioId);

    $query = null;
    $pdo = null;


    require 'participacoes.view.php';

} else {
    // If it has not been submitted, skip the validation
    header('Location: index.php');
    exit();
}

?>