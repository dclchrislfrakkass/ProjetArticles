<?php
// Appel conexion a la base
// require '../php/pdo.php';

$title = 'Contact';
ob_start();
?>

<main>
<h1>Contactez moi</h1>


</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>