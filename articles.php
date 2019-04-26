<?php
$title = 'Articles';
session_start();
ob_start();
require_once('config/functions.php');
$articles = getArticles();
// $user = 'frakkass';
?>

<main class="text-center">
<h1>Articles : </h1>
<?php foreach($articles as $article): ?>
    <div class='card bg-light mb-3 col-11 col-xl-6 mx-auto'>
        <h2 class='card-header bg-warning text-white'><?= $article->title ?></h2>
        <p>de <?= $article->userId ?></p>
        <time>le <?= $article->date ?></time>
        <br/>
        <div class='card-body'>
        <a href="article.php?id=<?= $article->id ?>">Lire la suite</a>
    </div>
    </div>
<?php endforeach; ?>

</main>

<?php
$content = ob_get_clean();
require 'template.php';
?>