<?php
session_start();

if (isset($_POST['title']) && $_POST['content']) {

    require_once "../components/connect.php";

    $conn = new mysqli($host, $db_user, $db_pass, $db_name);
    $conn->query("SET NAMES 'utf8'");
    $conn->query("UPDATE article set Title='".$_POST['title']."', Content='".$_POST['content']."', Stat=".$_POST['status']."'");
    $conn->close();
    $_SESSION['e_edit'] = "Zmiany zostały zapisane";
}

?>
<html>
<?php require '../components/head.php' ?>

<body>
    <header>
        <h1>Edytuj Artykuł</h1>
    </header>
    <?php require '../components/nav.php' ?>
    <section>


        <?php
        require_once "../components/connect.php";

        $conn = new mysqli($host, $db_user, $db_pass, $db_name);
        $article = $conn->query("SELECT Title,Content,Stat FROM article WHERE ID = " . $_GET["id"]);

        if ($article->num_rows > 0) {
            while ($art = $article->fetch_assoc()) {
                echo ' <div class="w-50 m-auto">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tytuł</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="' . $art['Title'] . '" name="title" minlength="10">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Treść</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="5" minlength="60">' . $art['Content'] . '</textarea>
                    </div>
                    <br>
                    <label for="stat" class="form-label">Wybierz status</label><br>
                    <select id="stat" name="status">
                        <option value="1" selected>Aktywny</option>
                        <option value="0">Do usunięcia</option>
                    </select>
                    <br><br>
                    <input type="submit" value="Zapisz zmiany">
                </form>
                <a href="./my_articles.php" class="btn btn-primary w-25">Anuluj</a>
            </div>';
            }
        }
        mysqli_close($conn);
        ?>

    </section>
</body>

</html>