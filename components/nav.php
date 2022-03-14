<?php
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./home.php">Strona Główna</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">';
      if (isset($_SESSION['user'])){
echo ' <a class="nav-link" href="./article.php">Artykuły</a>
      <a class="nav-link" href="./add_article.php">Dodaj</a>
      <a class="nav-link" href="./my_articles.php">Moje artykuły</a>';
      }

echo ' </div>     
    </div>';
if (isset($_SESSION['user'])) {
    echo "<span style='color:green'><h5>Witaj, " . $_SESSION["user"] . "</h5></span>";
    echo '<a href="../func/logout.php" class="btn btn-warning" role="button">Wyloguj</a>';
} else {
    echo '<a href="./login_form.php" class="btn btn-warning" role="button">Zaloguj</a>';
}
echo '</div>
</nav>';
