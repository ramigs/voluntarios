<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    </head>
    <body>

<?php 

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
// define variables and set to empty values
$nome = $apelido = $email1 = $email2 = $tipoContato =
    $tlf = $genero = $nif = $dataNascimento =
    $localidade = $codigoPostal = "";

$consentePromocoes = false;
$consenteCampanhas = false;

echo nl2br("==== DEV ====\n");

$nome = "Ana";
$apelido = "Monteiro";
//$dataNascimento = "1988/11/08";
$tipoContato = "S";
$email1 = "a25monteiro@hotmail.com";
$email2 = "ana.monteiro@record.com";
$tlf = "917325349";
$genero = "F";
$nif = "254206123";
$localidade = "Palmela";
$codigoPostal = "2900-501";

//$consentePromocoes = false;
$consenteCampanhas = true;

$tipoRegisto = 'F';

try {

    require 'database/Connection.php';
    require 'database/QueryBuilder.php';
    require 'Voluntario.php';

    $pdo = Connection::make();

    // PREPARED STATEMENTS
    
    // Prepare
    $sql = 'INSERT INTO voluntario(nome, apelido, tipo_registo, data_nascimento, tipo_contato, email1, telefone, nif, localidade, codigo_postal, consente_promocoes, consente_campanhas) 
            VALUES(:nome, :apelido, :tipo_registo, :data_nascimento, :tipo_contato, :email1, :telefone, :nif, :localidade, :codigo_postal, :consente_promocoes, :consente_campanhas)';
    $stmt = $pdo->prepare($sql);
    
    // Bind Non-Nullable
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':apelido', $apelido);
    $stmt->bindParam(':tipo_registo', $tipoRegisto);

    // Bind all fields
    bindNullable($stmt, ':data_nascimento', $dataNascimento);
    bindNullable($stmt, ':tipo_contato', $tipoContato);
    bindNullable($stmt, ':email1', $email1);
    bindNullable($stmt, ':telefone', $tlf);
    bindNullable($stmt, ':nif', $nif);
    bindNullable($stmt, ':localidade', $localidade);
    bindNullable($stmt, ':codigo_postal', $codigoPostal);
    bindNullable($stmt, ':consente_promocoes', $consentePromocoes);
    bindNullable($stmt, ':consente_campanhas', $consenteCampanhas);

    // Execute
    $stmt->execute();
    $stmt = null;

    $query = new QueryBuilder($pdo);
    $voluntarios = $query->selectAll('voluntario', 'Voluntario');

   foreach($voluntarios as $voluntario) {
        echo $voluntario->info(). "<hr>";
    }

    //$stmt->close();

    } catch (PDOException $e) {
        die($e->getMessage());}


        echo nl2br("==== END DEV ====\n");

// If the REQUEST_METHOD is POST, then the form has been submitted - 
// and it should be validated. 
/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome           = test_input($_POST["nome"]);
    $apelido        = test_input($_POST["apelido"]);
    $dataNascimento = test_input($_POST["data-nascimento"]);
    $tipoContato    = test_input($_POST["tipo-contato"]);
    $email1         = test_input($_POST["email1"]);
    $email2         = test_input($_POST["email2"]);
    $tlf            = test_input($_POST["tlf"]);
    $genero         = test_input($_POST["genero"]);
    $nif            = test_input($_POST["nif"]);
    $localidade     = test_input($_POST["localidade"]);
    $codigoPostal   = test_input($_POST["codigo-postal"]);

    if (isset($_POST['consente-promocoes'])) {
        $consentePromocoes = true;
    }

    if (isset($_POST['consente-campanhas'])) {
        $consenteCampanhas = true;
    }

    // TODO: Server-side validation
    // https://www.formget.com/form-validation-using-php/
    // https://www.script-tutorials.com/form-validation-with-javascript-and-php/
    // https://stackoverflow.com/questions/15511603/php-javascript-form-validation
    // NICE-TO-HAVE: Repopulate input form fields in case of validation errors
    // https://stackoverflow.com/questions/5198304/how-to-keep-form-values-after-post
    // https://stackoverflow.com/questions/35619069/how-to-redirect-to-previous-page-and-keep-all-filled-input-same-using-php
    // https://stackoverflow.com/questions/12544812/redirect-back-and-keeping-previously-entered-values


    //header('Location: index.php');
    //exit;

} else {
    // If it has not been submitted, skip the validation
    header('Location: index.php');
    exit;
} */

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

// Function for basic field validation (present and neither empty nor only white space
    function IsNullOrEmptyString($str)
    {
        return (!isset($str) || trim($str) === '');
    }

    function bindNullable($stmt, $str_field, $value)
    {
        if (!IsNullOrEmptyString($value)) {
            $stmt->bindParam($str_field, $value);
        } else {
            $stmt->bindValue($str_field, null);
        }
    }

    ?>

    </body>

</html>    