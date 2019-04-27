<?php
// Appel conexion a la base
// require 'inc/pdo.php';
session_start();
$title = 'Contact';
ob_start();
?>

<main>
<h1 class="text-center">Contactez moi</h1>
<form action="send.php" class="container col-12 col-xl-6" method="POST">
<div class="form-group">
  <label for="email"></label>
  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email">
  <small id="email" class="form-text text-muted">Help text</small>
</div>

<div class="form-group">
  <label for="name"></label>
  <input class="form-control" type="text" name="name" id="name" class="form-control" placeholder="Votre Pseudo">
  <small id="name" class="text-muted">Pseudo</small>
</div>
<div class="form-group">
    <label for="object"></label>
    <input class="form-control" type="text" name="object" id="object" class="form-control" placeholder="Titre du message">
    <small id="object" class="text-muted">Objet du message</small>
    </div>
<div class="form-group">
  <label for="message"></label>
  <textarea class="form-control" name="message" id="message" rows="8" placeholder="Votre message"></textarea>
</div>
<button type="submit" class="btn btn-warning">Envoyer</button>
</form>
</main>
<?php


$content = ob_get_clean();
require 'template.php';
?>