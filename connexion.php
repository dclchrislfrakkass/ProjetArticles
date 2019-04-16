<?php
// Appel conexion a la base
// require '../php/pdo.php';

$title = 'connexion';
ob_start();
?>

<main>
<h1>Connexion</h1>


</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>