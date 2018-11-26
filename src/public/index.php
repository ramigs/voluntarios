<?php

session_start();

if (!isset($_SESSION['userId'])) {
    header ("Location: login.php");
    exit;
}

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'Voluntario.php';
require 'TipoRegisto.php';
require 'Helper.php';

$pdo = Connection::makePDO();

$query = new QueryBuilder($pdo);

$voluntarios = $query->selectVoluntariosActive();

$tiposRegisto = $query->selectAll('tipo_registo', 'TipoRegisto');

if(isset($_SESSION['idnewvol']) && !empty($_SESSION['idnewvol'])) {

    $newVoluntarioId = $_SESSION['idnewvol'];
    $newVoluntarioNome = $_SESSION['nomenewvol'];
    $newVoluntarioApelido = $_SESSION['apelidonewvol'];
    
    unset($_SESSION['idnewvol']);
    unset($_SESSION['nomenewvol']);
    unset($_SESSION['apelidonewvol']);
}

if(isset($_SESSION['iddeletedvol'])) {

    $deletedVoluntarioId = $_SESSION['iddeletedvol'];
    
    unset($_SESSION['iddeletedvol']);
}

require 'index.view.php';

?>
