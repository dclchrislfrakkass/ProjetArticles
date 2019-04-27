<?php
// Appel conexion a la base
// require 'inc/pdo.php';
session_start();
$title = 'Contact';
ob_start();
if($_SESSION['auth']){
  $pseudo = $_SESSION['user'];
  $mail = $_SESSION['mail'];
?>


  <main>

  <div class="formFond">
  <h1 class="text-center h1Form">Formulaire de contact</h1>
  <!-- Condition des errors ou success -->
  <?php if(array_key_exists('errors',$_SESSION)): ?>
  <div class="alert alert-danger">
      <?= implode('<br>', $_SESSION['errors']); ?>
  </div>
  <?php endif; ?>
  <?php if(array_key_exists('success',$_SESSION)): ?>
  <div class="alert alert-success">
      Votre email à bien été transmis !
  </div>
  <?php endif; ?>

  <h1 class="text-center">Contactez moi</h1>
  <p class="text-center">Toutes les entrées du formulaire sont obligatoires</p>
  <form action="send.php" class="container col-12 col-xl-6" method="POST">
  <div class="form-group">
    <label for="email"></label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" value="<?= $mail; ?>" required>
    <small id="email" class="form-text text-muted">Votre Email</small>
  </div>

  <div class="form-group">
    <label for="name"></label>
    <input class="form-control" type="text" name="name" id="name" class="form-control" placeholder="Votre Pseudo" value="<?= $pseudo ?>" required>
    <small id="name" class="text-muted">Pseudo</small>
  </div>
  <div class="form-group">
      <label for="object"></label>
      <input class="form-control" type="text" name="object" id="object" class="form-control" placeholder="Titre du message" value="<?php echo isset($_SESSION['inputs']['object'])? $_SESSION['inputs']['object'] : ''; ?>" required>
      <small id="object" class="text-muted">Objet du message</small>
      </div>
  <div class="form-group">
    <label for="message"></label>
    <textarea class="form-control" name="message" id="message" rows="8" placeholder="Votre message" value="<?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?>" required></textarea>
  </div>
  <button type="submit" class="btn btn-warning">Envoyer</button>
  </form>
  </main>

}else{

<main>

<div class="formFond">
<h1 class="text-center h1Form">Formulaire de contact</h1>
<!-- Condition des errors ou success -->
<?php if(array_key_exists('errors',$_SESSION)): ?>
<div class="alert alert-danger">
    <?= implode('<br>', $_SESSION['errors']); ?>
</div>
<?php endif; ?>
<?php if(array_key_exists('success',$_SESSION)): ?>
<div class="alert alert-success">
    Votre email à bien été transmis !
</div>
<?php endif; ?>

<h1 class="text-center">Contactez moi</h1>
<p class="text-center">Toutes les entrées du formulaire sont obligatoires</p>
<form action="send.php" class="container col-12 col-xl-6" method="POST">
<div class="form-group">
  <label for="email"></label>
  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>" required>
  <small id="email" class="form-text text-muted">Votre Email</small>
</div>

<div class="form-group">
  <label for="name"></label>
  <input class="form-control" type="text" name="name" id="name" class="form-control" placeholder="Votre Pseudo" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>" required>
  <small id="name" class="text-muted">Pseudo</small>
</div>
<div class="form-group">
    <label for="object"></label>
    <input class="form-control" type="text" name="object" id="object" class="form-control" placeholder="Titre du message" value="<?php echo isset($_SESSION['inputs']['object'])? $_SESSION['inputs']['object'] : ''; ?>" required>
    <small id="object" class="text-muted">Objet du message</small>
    </div>
<div class="form-group">
  <label for="message"></label>
  <textarea class="form-control" name="message" id="message" rows="8" placeholder="Votre message" value="<?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?>" required></textarea>
</div>
<button type="submit" class="btn btn-warning">Envoyer</button>
</form>
</main>
<?php
}

// on nettoie les données précédentes
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);


$content = ob_get_clean();
require 'template.php';
?>