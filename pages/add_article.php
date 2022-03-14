<?php
session_start();

if (isset($_POST['title']) && $_POST['content']) {

    require_once "../components/connect.php";

    $conn = new mysqli($host, $db_user, $db_pass, $db_name);
    $conn->query("SET NAMES 'utf8'");
    $conn->query("INSERT INTO article (Title, Content,User_ID,Stat) VALUES ('".$_POST['title']."','".$_POST['content']."',".$_SESSION['user_id'].",1)");
    $conn->close();
    $_SESSION['e_add'] = "ARTYKUŁ ZOSTAŁ DODANY";
}
?>
<html>

<?php require '../components/head.php' ?>

<body>
    <header>
        <h1>Dodaj Artykuł</h1>
        
    </header>
    <?php require '../components/nav.php' ?>
    <section>
        <span style="color:green">
            <?php
            if (isset($_SESSION['e_add'])) {
                echo $_SESSION['e_add'];
                unset($_SESSION['e_add']);
            }

            ?>

        </span>
        <div class="w-50 m-auto">
            <form method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tytuł</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" minlength="10">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Treść</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" minlength="60"></textarea>
                </div>
                <br>

                <input type="submit" value="Dodaj artykuł">
            </form>
        </div>

    </section>

</body>

</html>