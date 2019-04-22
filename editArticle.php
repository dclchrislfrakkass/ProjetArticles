<?php
// Appel conexion a la base
require 'inc/pdo.php';

$title = 'Editer un article';
ob_start();
?>
<script>
$(document).ready(function(){
$("button").click(function(){
    $.post("inc/update.php",
    {
    titreArticle$i: $article->titre,
    texteMessage$i: article->article
    },
    function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
    });
});
});
</script>

<main>
<h1 class="text-center">Editer un article</h1>

<section>
<form method="POST" action="">
    <?php
    $i = 1;

    $req = $bd->prepare("SELECT * FROM article");
    $req->execute();

    while ($article = $req->fetch()){
        echo "<div class='card bg-light mb-3 col-6 mx-auto'>";
        echo "<div class='card-header'>Article N° $i</div>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>";
        echo "Titre<br\> <input type='texte' name='titreArticle$i' id='titreArticle$i' value='$article->titre' class='col-12 col-xl-8'>";
        echo "<br/>Article</h4>";
        echo "<p class='card-text'>";
        echo "<textarea class='col-12 col-xl-8' name='texteMessage$i' rows='10' id='texteMessage$i'>$article->article</textarea>"; 
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
$content = ob_get_clean();
require 'template.php';
?>

