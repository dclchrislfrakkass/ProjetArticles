<?php
$title = "Archiver l'article";
session_start(); 
ob_start();

// $articles = getArticle();
// $user = 'frakkass';


$idArticle = $_POST['idArticle'];
// echo $idArticle;
require_once('config/connect.php');
$req = $bdd->prepare("SELECT * FROM articles WHERE id = $idArticle");
$req->execute();

?>
<form method="POST" action="">
<?php


while ($article = $req->fetch()){
    echo "<div class='card bg-light mb-3 col-6 mx-auto'>";
    echo "<div class='card-header'>Article id $idArticle </div>";
    echo "<input name='idArticle' type='hidden' value='$idArticle'>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>";
    echo "Titre<br\> <input type='texte' name='titreArticle' id='titreArticle' value='$article->title' class='col-12 col-xl-8'>";
    echo "<br/>Article</h4>";
    echo "<p class='card-text'>";
    echo "<textarea class='col-12 col-xl-8' name='texteMessage' rows='10' id='texteMessage'>$article->content</textarea>"; 
    echo "</p>";
    echo "<button type='submit' name='editArticle'  id='editArticle' class='btn btn-danger'>Archiver l'article </button>";
    echo "</div>";
    echo "</div>";

}
?>
</form>

<?php
if(isset($_POST['editArticle'])){
    $title = $_POST['titreArticle'];
    $content = $_POST['texteMessage'];



    require_once('config/connect.php');
    $req=$bdd->prepare("UPDATE articles set stock = '2' WHERE id = $idArticle");
    $req->execute();
    $req->closeCursor();
    header('location: articles.php');
}
$content = ob_get_clean();
require 'template.php';
?>