<?php 
    
// define variables and set to empty values
$name = $apelido = $email1 = $email2 = $tipoContato = 
$tlf = $genero = $nif = $dataNascimento = 
$localidade = $codigoPostal = "";

$consentePromocoes = false;
$consenteCampanhas = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome           = test_input($_POST["nome"]);
    $apelido        = test_input($_POST["apelido"]);
    $tipoContato    = test_input($_POST["tipo-contato"]);
    $email1         = test_input($_POST["email1"]);
    $email2         = test_input($_POST["email2"]);
    $tlf            = test_input($_POST["tlf"]);
    $genero         = test_input($_POST["genero"]);
    $nif            = test_input($_POST["nif"]);
    $dataNascimento = test_input($_POST["data-nascimento"]);
    $localidade     = test_input($_POST["localidade"]);
    $codigoPostal   = test_input($_POST["codigo-postal"]);

    if (isset($_POST['consente-promocoes'])) {
        $consentePromocoes = true;
    }

    if (isset($_POST['consente-campanhas'])) {
        $consenteCampanhas = true;
    }

    //header('Location: index.php');
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