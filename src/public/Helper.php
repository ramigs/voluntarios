<?php
class Helper 
{   
    static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    static function calculateAgeFromDateOfBirth($dateOfBirth)
    {
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    }

    static function decodeTipoRegisto($tiposRegisto, $tipoRegisto)
    {
        foreach ($tiposRegisto as $tr) {
            if ($tr->codigo_registo == $tipoRegisto)
                return $tr->descricao_registo;
        }
    }

    static function dateToStringPT($date) 
    {
        setlocale(LC_TIME, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese');
        date_default_timezone_set('Europe/Lisbon');
        return strftime('%d de %B de %Y', strtotime($date));
    }
}

?>