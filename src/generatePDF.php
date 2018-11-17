<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'fpdf181/fpdf.php';

    // clean previous files

    $cleanPost = array_map('test_input', $_POST);

    $filename = 'hello.pdf';

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, utf8_decode($cleanPost['voluntarioNome']));
    $pdf->Cell(40, 10, utf8_decode($cleanPost['voluntarioApelido']));
    //$pdf->Cell(40, 10, $cleanPost['voluntarioNIF']);
    //$pdf->Cell(40, 10, utf8_decode($cleanPost['acaoNome']));
    //$pdf->Cell(40, 10, utf8_decode($cleanPost['acaoLocal']));
    //$pdf->Cell(40, 10, $cleanPost['acaoData']);
    $pdf->Output('F', $filename);

    echo ($filename);

} else {
    header('Location: voluntarios.php');
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>