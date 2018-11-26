<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        header('Location: index.php?deleted=error');
        exit;

    }
    
    //Load Composer's autoloader
    require '../resources/libs/vendor/autoload.php';
    require '../resources/config.php';

    if (array_key_exists('smtp', $config)) {
        $mailHost = $config['smtp']['host'];
        $mailUser = $config['smtp']['username'];
        $mailPass = $config['smtp']['password'];
    } else {
        header('Location: index.php?emailSent=skip');
        exit;
    }

    //$mail = new PHPMailer(true);
    $mail = new PHPMailer();
    try {
        //Server settings
        //$mail->SMTPDebug = 2;        // Enable verbose debug output
        $mail->isSMTP();             // Set mailer to use SMTP
        $mail->Host = $mailHost;     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;      // Enable SMTP authentication
        $mail->Username = $mailUser; // SMTP username
        $mail->Password = $mailPass; // SMTP password
        $mail->SMTPSecure = 'tls';   // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;           // TCP port to connect to
    
        //Recipients
        $mail->setFrom($mail->Username, utf8_decode("Banco Alimentar Setúbal"));
        $mail->addAddress(Helper::test_input($_POST['voluntarioEmail'])); // Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('info@bancoalimentarsetubal.org');
    
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = utf8_decode('Confirmação de remoção de dados pessoais');
        $mail->Body    = utf8_decode('<h4>Declaração</h4>
                        <p>Serve a presente para se confirmar que procedemos, conforme o por si
                        solicitado, e dando cumprimento à legislação RGPD, publicada em
                        04/05/2016 e que entrou em vigor a 25/05/2018, à remoção dos seus
                        dados pessoais da nossa base de dados.
                        </p>
                        <p>Palmela,</p><p>' . Helper::dateToStringPT("today") . '</p>
                        <p>A Direcção</p>');
        $mail->AltBody = 'Declaração: Serve a presente para se confirmar que procedemos, conforme o por si
        solicitado, e dando cumprimento à legislação RGPD, publicada em
        04/05/2016 e que entrou em vigor a 25/05/2018, à remoção dos seus
        dados pessoais da nossa base de dados. A Direcção';
    
        $mail->send();

        header('Location: index.php?emailSent=success');
        exit;
    } catch (Exception $e) {
        header('Location: index.php?emailSent=error');
        exit;
    }

} else {
    header('Location: index.php');
    exit;
}

?>