<?php

// Instead of deleting the row, this handler masks it
// by assigning null to all unique identifier fields of Voluntario

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

if ($_SERVER["REQUEST_METHOD"] == "POST"
        && isset($_POST['voluntarioId']) 
        && isset($_POST['submit-delete'])) {

    require 'database/Connection.php';
    require 'Helper.php';

    $pdo = Connection::makePDO();

    // Tipo de Remoção: Parcial
    // Apaga todos os dados que possam identificar o voluntário
    // a remover
    $stmt = $pdo->prepare(
        "UPDATE voluntario SET 
                nome=:nomeMasked, 
                apelido=:apelidoMasked, 
                data_nascimento=:dtNascMasked, 
                email1=:email1Masked,
                email2=:email2Masked,
                telefone=:tlfMasked,
                nif=:nifMasked,
                tipo_remocao=:tipoRem
                WHERE id = :id");


    $voluntarioId = Helper::test_input($_POST["voluntarioId"]);
    $stmt->bindValue(':nomeMasked', 'nomeMask', PDO::PARAM_STR);
    $stmt->bindValue(':apelidoMasked', 'apelidoMask', PDO::PARAM_STR);
    $stmt->bindValue(':dtNascMasked', null, PDO::PARAM_INT);
    $stmt->bindValue(':email1Masked', null, PDO::PARAM_INT);
    $stmt->bindValue(':email2Masked', null, PDO::PARAM_INT);
    $stmt->bindValue(':tlfMasked', null, PDO::PARAM_INT);
    $stmt->bindValue(':nifMasked', null, PDO::PARAM_INT);
    $stmt->bindValue(':tipoRem', 'P', PDO::PARAM_STR);
    $stmt->bindParam(':id', $voluntarioId); 
    $stmt->execute();

    $updated = $stmt->rowCount();

    $stmt = null;
    $pdo = null;

    if ($updated == 1) {
        $_SESSION['iddeletedvol'] = $voluntarioId;
    } else {
        $_SESSION['iddeletedvol'] = '0';
    }

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}

?>