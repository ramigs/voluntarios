<?php

session_start();

// If the user is logged-in and requests this page directly from the browser,
// then proceed to logout the user
if (isset($_SESSION['userId'])) {
    require ('logout.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-submit'])) {

    require ('database/Connection.php');

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit;
    } else {

        $conn = Connection::makeMySQLi();

        $sql = "SELECT * FROM user where username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            
            header ("Location: login.php?error=dberror");
            exit;

        } else {
            
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $pwdCheck = password_verify($password, $row['password_hash']);

                if ($pwdCheck == false) {
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header ("Location: login.php?error=invalidlogin");
                    exit;
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userName'] = $row['username'];

                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header ("Location: index.php");
                    exit;
                }

            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header ("Location: login.php?error=invalidlogin");
                exit;
            }
        }
    }

} else {

    require('login.view.php');

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>