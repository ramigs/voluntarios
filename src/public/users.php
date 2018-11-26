<?php

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('database/Connection.php');
require('database/QueryBuilder.php');
require 'Helper.php';
require 'User.php';

$username = "user";
$password = 'pass';

$pdo = Connection::makePDO();

$sql = 'INSERT INTO user(username, password_hash) 
                VALUES(:username, :password_hash)';
$stmt = $pdo->prepare($sql);

if (!function_exists('password_hash')) {
    require "../resources/libs/password_compat-master/lib/password.php";
}

$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

$stmt->bindParam(':username', $username);
$stmt->bindParam(':password_hash', $hashedPwd);
$stmt->execute();

echo 'User adicionado com sucesso!';

?>