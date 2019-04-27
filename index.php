<?php
// Appel conexion a la base
// require 'inc/pdo.php';
$title = 'Accueil';
session_start();
ob_start();
?>
<main>

<?php
if (!empty($_SESSION['auth'])){
    echo "<h1 class='text-center'>--> Hello ". $_SESSION['user'] ."!<--</h1>";
    
}
else {
echo "<h1 class='text-center'>Hello tout le monde !</h1>";
}
?>

<br/>
<section class="container">
<article class="row">
<div class="col-12 text-center">
<h2>Bienvenue sur les articles de Frakkass.</h2>
<br/>
<img class="mb-5" src="images/frakkass_256.png" alt="frakkass logo">
<p>Vous trouverez sur ce site dans la partie articles des articles que je poste.</p>
<p>Biensûr, ils ne parleront de rien préçisement puisque ce n'est qu'à titre de travail personnel que je poste.</p>
<br/>
<p> Merci pour votre passage sur le site !</p>

</div>

</article>

</section>
</main>

<?php
$content = ob_get_clean();
require 'template.php';
?>