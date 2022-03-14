<?php
session_start();



require_once "../components/connect.php";
if(isset($_GET['ID'])){
$conn = new mysqli($host, $db_user, $db_pass, $db_name);
$conn->query("SET NAMES 'utf8'");
$conn->query("DELETE FROM article WHERE ID = '" . $_GET['ID'] . "'");

$_SESSION['del_art'] = "Artykuł został usunięty";

mysqli_close($conn);
}
?>
<html>
<?php require '../components/head.php' ?>

<body>
    <header>
        <h1>Moje artykuły</h1>
    </header>
    <?php require '../components/nav.php' ?>
    <section>
        <span style="color:blue">
            <?php
            if (isset($_SESSION['del_art'])) {
                echo $_SESSION['del_art'];
                unset($_SESSION['del_art']);
            }

            ?>

        </span>

        <span style="color:green">
            <?php
            if (isset($_SESSION['e_edit'])) {
                echo $_SESSION['e_edit'];
                unset($_SESSION['e_edit']);
            }

            ?>

        </span>
        <?php
        require_once "../components/connect.php";

        $conn = new mysqli($host, $db_user, $db_pass, $db_name);
        $all_articles = $conn->query('SELECT ID,Title,Content,Stat FROM article where User_ID = ' . $_SESSION["user_id"]);

        if ($all_articles->num_rows > 0) {
            $num = 1;
            while ($art = $all_articles->fetch_assoc()) {


                echo '<div class="card w-25 m-auto" style="width: 18rem;">
                <div class="card-body">';
                if ($art['Stat'] == 1) {
                    echo "<span style='color:green'> <p>Aktywny</p></span>";
                } else {
                    echo "<span style='color:red'> <p>Do Usunięcia</p></span>";
                }
                echo '<h5 class="card-title">' . $art["Title"] . "</h5>";
                echo '<p class="card-text">' . substr($art["Content"], 0, 100) . "...</p>";
                echo '<a href="./edit_article.php?id=' . $art["ID"] . '" class="btn btn-info">Edytuj</a>';
                echo '<a href="./my_articles.php?ID=' . $art["ID"] . '" class="btn btn-danger">Usuń</a></div></div>';
                echo '<br>';
                $num++;
            }
        }
        mysqli_close($conn);
        ?>

    </section>
</body>

</html>