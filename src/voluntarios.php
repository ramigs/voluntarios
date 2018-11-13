<?php

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'Voluntario.php';
require 'TipoRegisto.php';

$pdo = Connection::make();

$query = new QueryBuilder($pdo);
$voluntarios = $query->selectAll('voluntario', 'Voluntario');

$tiposRegisto = $query->selectAll('tipo_registo', 'TipoRegisto');

function displayTableVoluntarios($voluntarios, $tiposRegisto)
{
    $voluntariosHTML = '<table class="table">' .
        '<thead>' .
        '<tr>' .
        '<th>Nome</th>' .
        '<th class="text-right">Idade</th>' .
        '<th>Email</th>' .
        '<th>Localidade</th>' .
        '<th>Tipo de Registo</th>' .
        '<th class="text-right">Ações</th>' .
        '</tr>' .
        '</thead>';

    $buttonsHTML = '<button type="button" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-user"></i>
                    </button>' .
                    '<button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                    </button>' .
                    '<button type="button" rel="tooltip" title="Apagar" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-times"></i>
                    </button>';

    if (count($voluntarios) > 0) {

        $voluntariosHTML .= '<tbody>';

        foreach ($voluntarios as $voluntario) {
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
    foreach ($tiposRegisto as $tr)
    {
        if ($tr->codigo_registo == $tipoRegisto)
            return $tr->descricao_registo;
    }
}

require 'voluntarios.view.php';


?>
