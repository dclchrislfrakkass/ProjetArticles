<?php
// Appel conexion a la base
// require '../php/pdo.php';

$title = 'Accueil';
ob_start();
?>
<main>

<h1 class="text-center">Hello tout le monde !</h1>
<br/>
<section class="container">
<article class="row">
<div class="col-8">
<h2>Bienvenue sur les articles de Frakkass.</h2>
<br/>
<p>Vous trouverez sur ce site dans la partie articles des articles que je poste.</p>
<p>Biensûr, ils ne parleront de rien préçisement puisque ce n'est qu'à titre de travail personnel que je poste.</p>
<br/>
<p> Merci pour votre passage sur le site !</p>
</div>
<aside class="row col-4">
    <img class="img-fluid.max-width: 100%; height: auto" src="images/frakkass_256.png" alt="frakkass logo">
    </aside>
</article>

</section>
</main>

<?php
$content = ob_get_clean();
require 'template.php';
?>