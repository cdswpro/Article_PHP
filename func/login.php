<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['pass']))) {
    header("Location: ../home.php");
    exit();
}

require_once "../components/connect.php";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($res = $conn->query(sprintf(
    "SELECT * FROM users WHERE Login='%s'",
    mysqli_real_escape_string($conn, htmlentities($_POST['login'], ENT_QUOTES, "UTF-8"))
))) {
    $ii = $res->num_rows;
    if ($ii > 0) {
        $row = $res->fetch_assoc();

        if (password_verify($_POST['pass'], $row['Pass'])) {
            $_SESSION['login_ok'] = true;
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user'] = $row['Login'];
            $_SESSION['pass'] = $row['Pass'];


            unset($_SESSION['err_login']);
            $res->close();

            header('Location: ../pages/home.php');
        } else {
            $_SESSION['err_login'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';

            header("Location: ../index.php");
        }
    } else {

        $_SESSION['err_login'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';

        header("Location: ../index.php");
    }
} else {
    echo "ERROR SQL";
}

$conn->close();
