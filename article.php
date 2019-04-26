<?php
session_start();
ob_start();
?>
<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])){
    header('Location: index.php');
}else {
    extract($_GET);
    $id = strip_tags($id);

    require_once('config/functions.php');

    if(!empty($_POST)){
        extract($_POST);
        $errors = array();

        $author = strip_tags($author);
        $comment = strip_tags($comment);

        if(empty($author)){
            array_push($errors, 'Entrez un pseudo');
        }
        if (empty($comment)){
            array_push($errors, 'Vous n\'avez pas laissé de commentaire');
        }
        if(count($errors) == 0){
            $comment = addComment($id, $author, $comment);
            $success = 'Votre commentaire a été publié';

            unset($author);
            unset($comment);
        }
    }

    $article = getArticle($id);
    $comments = getComments($id);
    $user = getUser($id);

}

?>

<main>
    <a href="articles.php">Retour aux articles</a>
<section class="text-center">
    <h1><?= $article->title ?></h1>
    <time><?= $article->date ?></time>
    <p class="mx-auto col-10 col-xl-8"><?= nl2br($article->content) ?></p>
    <form action="updateArticle.php" method="POST">
        <input type="hidden" name="idArticle" value="<?= $id?>">
        <input class="btn btn-warning text-white" type="submit" value="Modifier l'article">
    </form>
    <hr/>

    <?php
    if (isset($success)){
        echo "<p class='mx-auto alert alert-success col-xl-3'>". $success."</p>";
    }
    if(!empty($errors)): ?>

        <?php foreach($errors as $error): ?>
            <p class="mx-auto alert alert-danger col-xl-3"><?= $error ?></p>
        <?php endforeach; ?>

    <?php endif; ?>

    <form action="article.php?id=<?= $article->id ?>" method="POST">
        <p><label for="author">Pseudo : </label><br/>
    <?php if(isset($_SESSION['auth'])){ ?>
        <div>RIEN</div>
        <!-- <input type="text" name="author" id="author" value="<?php if(isset($user)) echo $user ?>"/></p> -->
    <?php }else { ?>
        <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>"/></p>
    <?php } ?>
        <p><label for="comment">Commentaire : </label><br/>
        <textarea name="comment" id="comment" cols="30" rows="8"><?php if(isset($comment)) echo $comment ?></textarea></p>
        <button class="btn btn-success" type="submit">Envoyer</button>

    </form>
    <h2>Commentaires :</h2>

    <?php foreach($comments as $com): ?>
        <h3><?= $com->author ?></h3>
        <time><?= $com->date ?></time>
        <p><?= $com->comment ?></p>
<?php endforeach; ?>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</main>


<?php
$content = ob_get_clean();
require 'template.php';
?>