<?php

session_start();

if (!isset($_SESSION['userId'])) {
    header ("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require '../resources/libs/fpdf181/fpdf.php';

    $cleanPost = array_map('test_input', $_POST);

    $userDownloadFolder = './downloads/' . $_SESSION['userId'] . '/' ;

    if (!file_exists($userDownloadFolder)) {
        mkdir($userDownloadFolder, 0777, true);
    }

    $filename = $userDownloadFolder . 'comprovativo.pdf';

    $pdf = new FPDF();

    $pdf->AddFont('Calibri', '', 'Calibri.php');
    $pdf->AddFont('Calibri','B','CALIBRIB.php');

    // A4 width: 219mm
    // default margin: 10mm each side
    // configured margin: 20mm each side
    // writable horizontal: 219 - (20 * 2) = 169mm
    $pdf->AddPage('P', 'A4');
    $pdf->SetMargins(20, 30, 20);
    $pdf->SetAutoPageBreak(TRUE, 0);

    // Logo
    $pdf->Image('./images/logo.jpg', 20, 15, 30);
    
    $pdf->Ln(50);

    $pdf->SetFont('Calibri', 'B', 14);
    $pdf->Cell(0, 10, utf8_decode('DECLARAÇÃO'), 0, 0, 'C');
    
    $pdf->Ln(30);

    $pdf->SetFont('Calibri', 'B', 11);
    $pdf->Write(5, utf8_decode('O BANCO ALIMENTAR CONTRA A FOME NA PENÍNSULA DE SETÚBAL'));
    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode(', '));

    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode('Instituição Particular de Solidariedade Social, inscrita com o Nº 81/2001, a fls. 178 do livro Nº 8 das Associações de Solidariedade Social (DR Nº 187, III Série, 13/08/2001), com sede na Urbanização Vila Amélia - Lote 1001, Fracções A a C - Cabanas - Palmela, Contribuinte nº '));

    $pdf->SetFont('Calibri', 'B', 11);
    $pdf->Write(5, utf8_decode('504 920 502'));
    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode(', declara para os devidos efeitos que '));
    $pdf->SetFont('Calibri', 'B', 11);
    $pdf->Write(5, utf8_decode($cleanPost['voluntarioNome']) . ' ' . $cleanPost['voluntarioApelido']);
    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode(', Contribuinte nº '));
    $pdf->SetFont('Calibri', 'B', 11);
    $pdf->Write(5, utf8_decode($cleanPost['voluntarioNIF']));
    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode(', participou como voluntário na ' . $cleanPost['acaoNome'] . ', ocorrida em ' . $cleanPost['acaoLocal'] . ', no dia ' . dateToStringPT($cleanPost['acaoData']) . ', nesta Instituição.'));

    $pdf->Ln(15);

    $pdf->Cell(0, 10, utf8_decode('Palmela, ' . dateToStringPT("today")), 0, 0, 'R');

    $pdf->Ln(15);

    $pdf->Cell(0, 10, utf8_decode('O Presidente do Banco Alimentar Contra a Fome de Setúbal'), 0, 0, 'L');
    
    $pdf->Ln(15);

    $pdf->Image('./images/assinatura.png');

    $pdf->Ln(5);
    $pdf->SetFont('Calibri', '', 9);
    $pdf->Write(5, utf8_decode('Alexandra Corrêa Figueira'));

    $pdf->Ln(20);
    
    $pdf->SetFont('Calibri', 'B', 10);
    $pdf->Cell(0, 10, utf8_decode('PORQUE A FOME EXISTE 24 HORAS POR DIA, 7 DIAS POR SEMANA, 365 DIAS POR ANO'), 0, 0, 'L');

    $pdf->Ln(20);

    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode('Caso pretenda'));
    //$pdf->Cell(0, 10, utf8_decode('Caso pretenda fazer um donativo para, poderá utilizar o seguinte NIB'), 0, 0, 'L');
    $pdf->SetFont('Calibri', 'B', 11);
    $pdf->Write(5, utf8_decode(' alimentar esta ideia'));
    $pdf->SetFont('Calibri', '', 11);
    $pdf->Write(5, utf8_decode(' poderá utilizar o seguinte NIB'));

    $pdf->SetFont('Calibri', 'B', 11);

    $pdf->Ln(10);

    $pdf->Cell(0, 10, utf8_decode('NIB  0036 0009 99100 0677 8545'), 0, 0, 'L');

    $pdf->Ln(35);

    $pdf->SetFont('Courier', '', 6);
    $pdf->Cell(0, 10, utf8_decode('Banco Alimentar de Setúbal'), 0, 0, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('Urbanização Vila Amélia, Lote 1001 Frações A-C Cabanas'), 0, 0, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('2950-805 Palmela'), 0, 0, 'L');
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('Telef 212 339 540 | Telem 919 003 959'), 0, 0, 'L');
    $pdf->Ln(3);
    $pdf->SetTextColor(0, 0, 255);
    $pdf->Cell(0, 10, utf8_decode('ba.setubal@bancoalimentar.pt'), 0, 0, 'L');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, utf8_decode('INSTITUIÇÃO RECONHECIDA COMO PESSOA'), 0, 0, 'R');
    $pdf->Ln(3);
    $pdf->SetTextColor(0, 0, 255);
    $pdf->Cell(0, 10, utf8_decode('http://setubal.bancoalimentar.pt'), 0, 0, 'L');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0, 10, utf8_decode('COLETIVA DE UTILIDADE PÚBLICA'), 0, 0, 'R');
    
    $pdf->Output('F', $filename);

    echo ($filename);

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

function dateToStringPT($date) {

    setlocale(LC_TIME, 'pt_PT', 'pt_PT.utf-8', 'pt_PT.utf-8', 'portuguese');
    date_default_timezone_set('Europe/Lisbon');
    return strftime('%d de %B de %Y', strtotime($date));
}

?>