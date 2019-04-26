<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="index.php">Les articles de Frakkass</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="articles.php">Articles</a>
    </li>
    <li class="nav-item">
    <?php
    if (isset($_SESSION['auth'])){
        if ($admin){
        echo "<a class='nav-link text-warning' href='newArticle.php'>Ecrire un article</a>";
        }else {}
    }
    else {}
    ?>
    </li>
    <li class="nav-item">

    </li>
    <li class="nav-item">
    <?php
    if (isset($_SESSION['auth'])){
        if ($admin){
        echo "<a class='nav-link text-danger' href='membres.php'>membres</a>";
        }else {}
    }
    else {}
    ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
    </li>
    <li class="nav-item text-white">

    </li>

    </ul>
    <div class="nav-item active my-2 my-lg-0 text-light">
    <?php
    if (isset($_SESSION['auth'])){
        echo "<form action='deconnexion.php' method='get'>";
        echo "<input class='btn btn-outline-danger' type='submit' value='Déconnexion'/>";
        echo "</form>";
    }
    else {
        echo "<form action='connexion.php' method='get'>";
        echo "<input class='btn btn-outline-info' type='submit' value='Connexion'/>";
        echo "</form>";
    }
    ?>
    </div>
    <!--<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">plus</button> 
    </form>-->
</div>
</nav>