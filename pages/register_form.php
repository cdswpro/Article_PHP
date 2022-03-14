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

        <h1>Rejestracja</h1>
    </header>
    <?php require '../components/nav.php' ?>
    <section>
        <?php
        if (isset($_SESSION['throw_ex'])) {
            echo '<div style="color:red">' . $_SESSION['throw_ex'] . '</div>';
            unset($_SESSION['thorw_ex']);
        }
        if (isset($_SESSION['reg_err'])) {
            echo '<div style="color:red">' . $_SESSION['reg_err'] . '</div>';
            unset($_SESSION['reg_err']);
        }
        if (isset($_SESSION['reg_err'])) {
            echo '<div style="color:red">' . $_SESSION['reg_err'] . '</div>';
            unset($_SESSION['reg_err']);
        }

        ?>
        <div>

            <div class="w-50 m-auto">
            <form class="w-25 m-auto " action="../func/register.php" method="post">

                <label for="login">Wybierz Login:</label><br>
                <input type="text" name="login"><br>
                <?php
                if (isset($_SESSION['e_login'])) {
                    echo '<div style="color:red">' . $_SESSION['e_login'] . '</div>';
                    unset($_SESSION['e_login']);
                }
                ?>

                <br>

                <label for="pass1">Podaj nowe hasło:</label><br>
                <input type="password" name="pass1"><br>
                <?php
                if (isset($_SESSION['e_pass'])) {
                    echo '<div style="color:red">' . $_SESSION['e_pass'] . '</div>';
                    unset($_SESSION['e_pass']);
                }
                ?>
                <br>

                <label for="pass2">Powtórz nowe hasło:</label><br>
                <input type="password" name="pass2"><br>

                <input id="zaloguj" type="submit" value='Zarejestruj'><br>

                <?php
                if (isset($_SESSION['err_login'])) {
                    echo $_SESSION['err_login'];
                    unset($_SESSION['err_login']);
                }
                ?>
                <br>
                <br>


            </form>
            </div>

            <br><br>
        </div>

    </section>

</body>

</html>