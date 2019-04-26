<?php
// Appel conexion a la base
require 'inc/pdo.php';

$title = 'Editer un article';
ob_start();
?>



<?php

echo $_POST['titreArticle$i'];


if(isset($_POST['editArticle$i'])) {

    if(!empty($_POST['titreArticle$i']) and !empty($_POST['texteMessage$i'])){
        $titreA = htmlspecialchars(trim($_POST['titreArticle$i']));
        $texteA = htmlspecialchars(trim($_POST['texteMessage$i']));

        // $ajoutArticle = $bd->prepare("INSERT INTO article SET titre = :titre, article = :texte");
        // $ajoutArticle->bindParam(':titre', $titreA);
        // $ajoutArticle->bindParam(':texte', $texteA);
        // $ajoutArticle->execute();
        echo "<form method='POST' action=''>";
        echo "<div class='container'>";
        echo "<div class='form-group'>";
        echo "<h2>Titre de l'article</h2>";
        echo "<input type='texte' name='titreArticle$i' id='titreArticle$i' value='$article->titre' class='col-12 col-xl-8'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<h2>Article</h2>";
        echo "<textarea class='col-12 col-xl-8' name='texteMessage$i' rows='10' id='texteMessage$i'>$article->article</textarea>";
        echo "</div>";
        echo "<button type='submit' name='addArticle'  id='addArticle' class='btn btn-success'>Mettre à jour !</button>";
        echo "</form>";
        // echo "<div class='bg-success text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Article ajouté !</div>";

    } else {
    echo "<div class='bg-danger text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Merci de remplir tous les champs !</div>";
}
}



$content = ob_get_clean();
require 'template.php';
?>











