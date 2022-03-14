<?php
session_start();

if (isset($_POST['login'])) {
    //udana walidacja? tak
    $register_ok = TRUE;
    //dlugość loginu
    if ((strlen($_POST['login']) < 5) || (strlen($_POST['login']) > 20)) {
        $register_ok = false;
        $_SESSION['e_login'] = "Login musi zawierać od 5 do 20 znaków.";
    }
    if (ctype_alnum($_POST['login']) == false) {
        $register_ok = false;
        $_SESSION['e_login'] = "Login może zawierać tylko litery i cyfry(bez polskich znaków).";
    }
    //sprawdz hasła

    if ((strlen( $_POST['pass1']) < 8) || (strlen( $_POST['pass1']) > 30)) {
        $register_ok = false;
        $_SESSION['e_pass'] = "Hasło musi posiadać od 8 do 30 znaków.";
    }

    if ( $_POST['pass1'] != $_POST['pass2']) {
        $register_ok = false;
        $_SESSION['e_pass'] = "Podane hasła nie są identyczne.";
    }

    $pass_hash = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    

    require_once "../components/connect.php";

    $conn = new mysqli($host, $db_user, $db_pass, $db_name);
    if ($conn->connect_errno != 0) {
        $_SESSION['throw_ex'] = "Błąd połączenia"; //rzuć nowym wyjątkiem;
        header('Location: ../register_form.php');
    } else {

        //czy login juz istnieje?

        $result_conn = $conn->query('SELECT * FROM users WHERE Login="'.$_POST['login'].'"');

        if (!$result_conn) $_SESSION['e_login'] = "Istnieje taki Login w bazie.";

        if ($result_conn->num_rows > 0) {
            $register_ok = false;
            $_SESSION['e_login'] = "Istnieje taki Login w bazie.";
            header('Location: ../register_form.php');
        }
       
        if ($register_ok == true) {
            //działa wszystko, zarejesttruj klienta
            if ($conn->query("INSERT INTO users VALUES (NULL,'".$_POST['login']."', '$pass_hash')")) {
                $_SESSION['reg_done'] = "Zostałeś zarejestronway. Możesz się zalogować.";
                header('Location: ../register_form.php');
            } else {
                $_SESSION['reg_err'] = 'Błąd rejestracji';
                header('Location: ../register_form.php');
            }
        }
        $conn->close();
    }
}
