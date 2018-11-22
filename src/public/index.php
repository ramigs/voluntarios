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

$pdo = Connection::makePDO();

$query = new QueryBuilder($pdo);
$voluntarios = $query->selectAll('voluntario', 'Voluntario');

usort($voluntarios, function($a, $b)
{
    return strcmp($a->nome, $b->nome);
});

$tiposRegisto = $query->selectAll('tipo_registo', 'TipoRegisto');

function displayTableVoluntarios($voluntarios, $tiposRegisto)
{
    $voluntariosHTML = '<table class="table">' .
        '<thead class="table-dark">' .
        '<tr>' .
        '<th>Nome</th>' .
        '<th class="text-right">Idade</th>' .
        '<th>Email</th>' .
        '<th>Localidade</th>' .
        '<th>Tipo de Registo</th>' .
        '<th class="text-right">Ações</th>' .
        '</tr>' .
        '</thead>';

    if (count($voluntarios) > 0) {

        $voluntariosHTML .= '<tbody>';

        foreach ($voluntarios as $voluntario) {

            $buttonsHTML = '<form action="participacoes.php" method="post">' .
                '<input type="hidden" name="voluntarioId" value="' . $voluntario->id . '">' .
                '<button type="submit" rel="tooltip" title="Ver Participações" class="btn btn-info btn-simple btn-xs">
                    <i class="fa fa-user"></i>
                </button>' .
                '</form>';

            $voluntariosHTML .= '<tr>';
            $voluntariosHTML .= '<td>' . $voluntario->nome . ' ' . $voluntario->apelido . '</td>';
            $voluntariosHTML .= '<td class="text-right">' . calculateAgeFromDateOfBirth($voluntario->data_nascimento) . '</td>';
            $voluntariosHTML .= '<td>' . $voluntario->email1 . '</td>';
            $voluntariosHTML .= '<td>' . $voluntario->localidade . '</td>';
            $voluntariosHTML .= '<td>' . decodeTipoRegisto($tiposRegisto, $voluntario->tipo_registo) . '</td>';
            $voluntariosHTML .= '<td class="td-actions text-right">' . $buttonsHTML . '</td>';
            $voluntariosHTML .= '<tr>';
        }

        $voluntariosHTML .= '</tbody>';
    }

    $voluntariosHTML .= '</table>';
    return $voluntariosHTML;
}

function calculateAgeFromDateOfBirth($dateOfBirth)
{
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    return $diff->format('%y');
}

function decodeTipoRegisto($tiposRegisto, $tipoRegisto)
{
    foreach ($tiposRegisto as $tr) {
        if ($tr->codigo_registo == $tipoRegisto)
            return $tr->descricao_registo;
    }
}

if(isset($_SESSION['idnewvol']) && !empty($_SESSION['idnewvol'])) {

    $newVoluntarioId = $_SESSION['idnewvol'];
    $newVoluntarioNome = $_SESSION['nomenewvol'];
    $newVoluntarioApelido = $_SESSION['apelidonewvol'];
    
    unset($_SESSION['idnewvol']);
    unset($_SESSION['nomenewvol']);
    unset($_SESSION['apelidonewvol']);
}

require 'index.view.php';


?>
