<?php

// Error reporting for DEV purposes
// Comment before PROD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-submit'])) {

    require('database/Connection.php');
    require('database/QueryBuilder.php');
    require 'Helper.php';
    require 'User.php';

    $username = Helper::test_input($_POST['username']);
    $password = Helper::test_input($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit;
    } else {

            $pdo = Connection::makePDO();

            $query = new QueryBuilder($pdo);

            $userArray = $query->selectUserByUsername($username);

            if (count($userArray) > 0) {
                $u = $userArray[0];

                if (!function_exists('password_verify')) {
                    require "../resources/libs/password_compat-master/lib/password.php";
                }

                $pwdCheck = password_verify($password, $u->password_hash);

                if ($pwdCheck == false) {
                    $pdo = null;
                    $query = null;
                    header("Location: login.php?error=invalidlogin");
                    exit;
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $u->id;
                    $_SESSION['userName'] = $u->username;

                    $pdo = null;
                    $query = null;
                    header("Location: index.php");
                    exit;
                }

            } else {

                $pdo = null;
                $query = null;
                header("Location: login.php?error=invalidlogin");
                exit;
            }
    }

} else {

    require('login.view.php');

}

?>