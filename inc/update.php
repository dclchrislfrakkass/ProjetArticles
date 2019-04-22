<?php
// Appel conexion a la base
require 'inc/pdo.php';

$title = 'Editer un article';
ob_start();
?>


<?php
if(isset($_POST['editArticle$i'])) {

    if(!empty($_POST['titreArticle$i']) and !empty($_POST['texteMessage$i'])){
        $titreA = htmlspecialchars(trim($_POST['titreArticle$i']));
        $texteA = htmlspecialchars(trim($_POST['texteMessage$i']));

        $ajoutArticle = $bd->prepare("update article SET titre = :titre, article = :texte");
        $ajoutArticle->bindParam(':titre', $titreA);
        $ajoutArticle->bindParam(':texte', $texteA);
        $ajoutArticle->execute();

        echo "<div class='bg-success text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Article Mis à jour !</div>";

    } else {
    echo "<div class='bg-danger text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Vérifiez que tous les champs soient bien remplis !</div>";
}
}
?>




<?php
$content = ob_get_clean();
require 'template.php';
?>

