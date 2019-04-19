<?php
// Appel conexion a la base
// require 'inc/pdo.php';;

$title = 'Articles';
ob_start();
?>

<main>

<h1 class="text-center">Mes articles</h1>

<section>








</section>

</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>