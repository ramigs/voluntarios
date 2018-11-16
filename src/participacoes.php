<?php 

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// If request came from 'voluntarios.php'
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['voluntarioId'])) {

    require 'database/Connection.php';
    require 'database/QueryBuilder.php';
    require 'Voluntario.php';

    $voluntarioId = test_input($_POST["voluntarioId"]);

    try {
        $pdo = Connection::make();

        $query = new QueryBuilder($pdo);
        $voluntario = $query->selectVoluntarioById($voluntarioId);

        $acoesVoluntario = $query->selectParticipacoesVoluntario($voluntarioId);

        // TO REFACTOR: Instead of sorting here, fetch data
        // already sorted from database
        usort($acoesVoluntario, function ($a, $b) {
            return ($a['data'] > $b['data']);
        });

        $query = null;
        $pdo = null;

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    require 'participacoes.view.php';

} else {
    // If it has not been submitted, skip the validation
    //header('Location: voluntarios.php');
    //exit;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>