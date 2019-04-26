<?php
require_once('config/connect.php');
$title = 'Nouvel article';
session_start();
ob_start();
?>

<main>
<h1 class="text-center">Ecrire un article</h1>
<?php 
if (isset($_SESSION['auth'])){
    echo "<h2 class='text-center'>Créateur : ".$_SESSION['user']." !</h2>";
    
}else{
    echo "<h1 class='text-center'>FUCK !!!!!!!</h1>";
}
    ?>
</h2>

<form method="POST" action="">
<div class="container">
    <div class="form-group">
        <h2>Titre de l'article</h2>
        <input type="texte" name="titreArticle" id="titreArticle" class="col-12 col-xl-8">
</div>
<div class="form-group">

        <h2>Article</h2>
        <textarea class="col-12 col-xl-8" name="texteMessage" rows="10" id="texteMessage"></textarea>
</div>
<button type="submit" name="addArticle"  id="addArticle" class="btn btn-success">Ajouter !</button>
</form>
</div>


</main>

<?php
if(isset($_POST['addArticle'])) {

    if(!empty($_POST['titreArticle']) and !empty($_POST['texteMessage'])){
        $titreA = htmlspecialchars(trim($_POST['titreArticle']));
        $texteA = htmlspecialchars(trim($_POST['texteMessage']));
        htmlentities($texteA);
        $author = $_SESSION['user'];
        require_once('config/connect.php');
        $ajoutArticle = $bdd->prepare("INSERT INTO articles SET title = ?, content = ?, author = ?, date = now()");
        $ajoutArticle->execute(array($titreA, $texteA, $author));
        $ajoutArticle->closeCursor();

        echo "<div class='bg-success text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Article ajouté !</div>";

    } else {
       echo "<div class='bg-danger text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Merci de remplir tous les champs !</div>";
   }
}
$content = ob_get_clean();
require 'template.php';
?>