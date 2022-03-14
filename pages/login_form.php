<?php
session_start();

if ((isset($_SESSION['login_ok'])) && ($_SESSION['login_ok'] == true)) {
    header('Location: ./pages/home.php');
    exit();
}
?>
<!DOCTYPE HTML>
<html lang="pl">

<?php require '../components/head.php' ?>

<body>

    <header>

        <h1>Logowanie</h1>
    </header>
    <?php require '../components/nav.php' ?>
    <section>
        <?php
        if (isset($_SESSION['reg_done'])) {
            echo '<div style="color:green">' . $_SESSION['reg_done'] . '</div>';
            unset($_SESSION['reg_done']);
        }
        ?>
        <div class="w-50 m-auto">
            <p class="w-25 m-auto">{login: admin; pass:master123}</p>

            <form class="w-25 m-auto" action="../func/login.php" method="post">

                <label for="login">LOGIN:</label><br>

                <input type="text" name="login"><br>
                <label for="pass">HASŁO:</label><br>

                <input type="password" name="pass"><br>

                <input id="zaloguj" type="submit" value='ZALOGUJ'><br>

                <?php
                if (isset($_SESSION['err_login'])) {
                    echo $_SESSION['err_login'];
                    unset($_SESSION['err_login']);
                }
                ?>
                <br>
                <br>

               
            </form>
            <div class="w-25 m-auto">
            <a href="./register_form.php"><button>ZAREJESTRUJ SIĘ</button></a>
            </div>
            

            <br><br>
        </div>

    </section>

</body>

</html>