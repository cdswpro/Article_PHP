<?php
session_start();
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
        $all_articles = $conn->query("SELECT ID,Title,Content,Stat FROM article order by ID desc");

        if ($all_articles->num_rows > 0) {
            $num = 1;
            while ($art = $all_articles->fetch_assoc()) {
                
                
                echo '<div class="card w-25 m-auto" style="width: 18rem;">
                <div class="card-body">';
                if($art['Stat'] == 1){
                    echo "<span style='color:green'> <p>Aktywny</p></span>";
                }else{
                    echo "<span style='color:red'> <p>Do Usunięcia</p></span>";
                }
                echo '<h5 class="card-title">' . $art["Title"] . "</h5>";
                echo '<p class="card-text">' . substr($art["Content"],0,100) . "...</p>";
                echo '<a href="./more.php?article='. $art["ID"] .'" class="btn btn-primary">Czytaj więcej...</a></div></div>';
                echo '<br>';
                $num++;
            }
        }
        mysqli_close($conn);
        ?>
     
    </section>
</body>
</html>