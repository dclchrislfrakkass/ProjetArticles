<?php
// Appel conexion a la base
// require '../php/pdo.php';

$title = 'Articles';
ob_start();
?>

<main>

<h1>Mes articles</h1>

</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>