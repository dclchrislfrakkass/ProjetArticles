<?php
// Appel conexion a la base
require_once('config/connect.php');

$title = 'Editer un article';
ob_start();
?>

<main>
<h1 class="text-center">Editer un article</h1>

<section>
<form method="POST" action="">
    <?php
    $i = 1;

    $req = $bdd->prepare("SELECT * FROM articles");
    $req->execute();

    while ($article = $req->fetch()){
        echo "<div class='card bg-light mb-3 col-6 mx-auto'>";
        echo "<div class='card-header'>Article N° $i</div>";
        $id = $article->id;
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>";
        echo "Titre<br\> <input type='texte' name='titreArticle$i' id='titreArticle$i' value='$article->title' class='col-12 col-xl-8'>";
        echo "<br/>Article</h4>";
        echo "<p class='card-text'>";
        echo "<textarea class='col-12 col-xl-8' name='texteMessage$i' rows='10' id='texteMessage$i'>$article->content</textarea>"; 
        echo "</p>";
        echo "<button type='submit' name='editArticle$i'  id='editArticle$i' class='btn btn-warning'>Modifier l'article $i</button>";
        echo "</div>";
        echo "</div>";
        $i++;
    }
    ?>
    </form>


    </section>

</main>

<?php
if(isset($_POST['titreArticle$i'], $_POST['texteMessage$i'])) {
    if(!empty($_POST['titreArticle$i']) AND !empty($_POST['texteMessage$i'])) {

        $article_titre = htmlspecialchars($_GET['titreArticle$i']);
        $article_contenu = htmlspecialchars($_GET['texteMessage$i']);
        require_once('config/connect.php');
        $update = $bdd->prepare('UPDATE articles SET titre = ?, content = ?, WHERE id = ?');
        $update->execute(array($article_titre, $article_contenu, $id));

    }
}

$content = ob_get_clean();
require 'template.php';
?>

