<?php
session_start();

$article_id = $_GET["article"];
?>
<html>
<?php require '../components/head.php' ?>

<body>
    <header>
        <h1>Artykuły</h1>
    </header>
    <?php require '../components/nav.php' ?>
    <section>
        <?php
        require_once "../components/connect.php";

        $conn = new mysqli($host, $db_user, $db_pass, $db_name);
        $article = $conn->query("SELECT Title,Content,Stat FROM article WHERE ID = " . $article_id);

        if ($article->num_rows > 0) {

            while ($art = $article->fetch_assoc()) {

                echo '<br><br><div class="card w-75 m-auto">
                <div class="card-header">' . $art["Title"] . "</div>";
                echo '<a href="./article.php" class="btn btn-primary w-25">Powrót</a>';
                echo '<div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>' . $art["Content"] . '</p>
                    <footer class="blockquote-footer">Autor</footer>
                </blockquote>
            </div>';
                echo '</div>';
            }
        }
        mysqli_close($conn);
        ?>
    </section>
</body>

</html>