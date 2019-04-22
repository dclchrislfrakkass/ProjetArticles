<?php
// Appel conexion a la base
require_once 'inc/pdo.php';

$title = 'Articles';
ob_start();
?>

<main>

<h1 class="text-center">Mes articles</h1>

<section>
<?php
$i = 1;

$req = $bd->prepare("SELECT * FROM article");
$req->execute();

while ($article = $req->fetch()){
    echo "<div class='card bg-light mb-3 col-6 mx-auto'>";
    echo "<div class='card-header'>Article N $i</div>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>$article->titre</h4>";
    echo "<p class='card-text'>$article->article</p>";
    echo "</div>";
    echo "</div>";
    $i++;

}
?>


</section>

</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>