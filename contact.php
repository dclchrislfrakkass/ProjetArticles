<?php
// Appel conexion a la base
// require 'inc/pdo.php';
session_start();
$title = 'Contact';
ob_start();
?>

<main>
<h1 class="text-center">Contactez moi</h1>


</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>