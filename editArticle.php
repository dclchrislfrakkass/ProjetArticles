<?php
// Appel conexion a la base
// require 'inc/pdo.php';

$title = 'Editer un article';
ob_start();
?>

<main>
<h1 class="text-center">Editer un article</h1>


</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>