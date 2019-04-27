<?php
$title = 'Articles';
session_start();
ob_start();
require_once('config/functions.php');
$articles = getArticles();
$i = 1;

// $user = 'frakkass';
?>

<main class="text-center">
<h1>Articles : </h1>
<div class="row">
<?php
     foreach($articles as $article):
        // var_dump($article);
        if($article->stock == 1){ ?>


            <div class='card bg-light mb-3 col-11 col-xl-3 mx-auto'>
                <h2 class='card-header bg-warning text-white'><?= $i." ". $article->title ?></h2>
                <p>de <?= $article->author ?></p>
                <time>le <?= $article->date ?></time>
                
                <br/>
                <div class='card-body'>
                <a href="article.php?id=<?= $article->id ?>">Lire la suite</a>
            </div>

            </div> 
    <?php
    $i++;
    }
    if($article->stock == 0){
        if(isset($_SESSION['auth'])){
            if($_SESSION['status'] == 1){ ?>

                <div class='card bg-light mb-3 col-11 col-xl-3 mx-auto'>
                    <h2 class='card-header bg-info text-white'><?= $i.' '. $article->title ?> <--A Valider</h2>
                    <p>de <?= $article->author ?></p>
                    <time>le <?= $article->date ?></time>
                    
                    <br/>
                        <div class='card-body'>
                        <a href="article.php?id=<?= $article->id ?>">Lire la suite</a>
                        </div>
                </div> 
    <?php
    $i++;
            }
        }
    }


    else{
            if(isset($_SESSION['auth'])){
                if($_SESSION['status'] == 1){ ?>
                    <div class='card bg-light mb-3 col-11 col-xl-3 mx-auto'>
                        <h2 class='card-header bg-danger text-white'><?= $i.' '. $article->title ?> ARCHIVE</h2>
                        <p>de <?= $article->author ?></p>
                        <time>le <?= $article->date ?></time>
                            
                        <br/>
                        <div class='card-body'>
                        <a href="article.php?id=<?= $article->id ?>">Lire la suite</a>
                    </div>
                    </div> 
                <?php
                $i++;
                }
            }
        }
endforeach; ?>
            

</div>
</main>

<?php
$content = ob_get_clean();
require 'template.php';
?>