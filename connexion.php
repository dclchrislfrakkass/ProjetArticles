<?php
// Appel conexion a la base
// require_once 'inc/pdo.php';
require_once('config/functions.php');

$title = 'Login / Connexion';
ob_start();
?>


<main>
<h1 class="text-center mb-5">Connexion / Inscription</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-xl-5">
        <h3 class="text-info">Connexion</h3>
        <form method="POST" action="">
            <label>Pseudo</label>  
            <input type="text" name="logUsername" id="logUsername" class="form-control" required/>
            <br/>
            <label>Mot de passe</label>  
            <input type="password" name="logPassword" id="logPassword" class="form-control" required/>
            <br/>
            <button type="submit" name="login_button" id="login_button" class="btn btn-warning">Connexion</button>
        </form>
        </div>
    <div class="col-12 col-xl-5">
        <h3 class="text-info">Inscription</h3>
        <form method="POST" action="">
            <label>Pseudo</label>  
            <input type="text" name="username" id="username" class="form-control" required/>  
            <br/>  
            <label>Mail</label>  
            <input type="email" name="email" id="email" class="form-control" required/>  
            <br/> 
            <label>Mot de passe</label>  
            <input type="password" name="password" id="password" class="form-control" required/>  
            <br/>  
            <label>Confirmation du mot de passe</label>  
            <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required/>  
            <br/>  
            <button type="submit" name="register_button" id="register_button" class="btn btn-warning">Inscription</button>
        </form>
    </div>
    </div>
</div>
<?php
 


/**
* CONNEXION
*/

if(session_status() == PHP_SESSION_NONE) {

    if(isset($_POST['login_button'])) {


        /* on test si les champ sont bien remplis */
        if(!empty($_POST['logUsername']) and !empty($_POST['logPassword']))
        {
            $username = htmlspecialchars(trim($_POST['logUsername']));
            $password = htmlspecialchars(trim($_POST['logPassword']));

            require('config/connect.php');
            $req = $bdd->prepare("SELECT * FROM user WHERE username = ?");
            $req->execute(array($username));
            $user = $req->fetch();
            $req->closeCursor();
    
            if (!$user)
            {
                ?>
                <p class="mx-auto alert alert-danger col-xl-3 mt-5">Mauvais identifiant ou mot de passe !<?= $verifU ?></p>
                <?php 
            }
            else
            {
                
                if (password_verify($_POST['logPassword'], $user->password)) {
                    session_start();
                
                    $_SESSION['auth'] = $user;
                    $pseudoMembre = $user->name;
                    $user = $_SESSION['auth']->name;
                    $idMembre = $user->id;
    
                    header('Location: index.php');
                    exit();
                } else {
                    echo 'Mauvais identifiant ou mot de passe !';


                }
            }
        }
    }
}

/**
 * INSCRIPTION
 */
 
if (isset($_POST['register_button'])) {
/* on test si les champ sont bien remplis */
    if(!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['repeatPassword']))
    {
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $repeatPassword = htmlspecialchars(trim($_POST['repeatPassword']));

        /* on test si le mdp contient bien au moins 6 caractère */
        if (strlen($_POST['password'])>=6)
        {
            /* On test si le MDP est rentré, et si les deux MDP ne sont pas différent */
            if (empty($_POST['password']) || $_POST['password'] != $_POST['repeatPassword'])
            {
                $errors['pass'] = "Vous devez rentrer un mot de passe valide";

            } else {
                // Vérifie si l'utilisateur n'est pas déjà enregistré
               
                $vUser = verifyUser($username);

                if ($vUser) {
                    ?>
                    <p class="mx-auto alert alert-danger col-xl-3">Cet utilisateur existe déjà !</p>
                    <?php
                } else {
                    // Insertion dans la base de donnée
                    // echo "<p class='mx-auto alert alert-success col-xl-3'> L'utilisateur n'existe pas !</p>";
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    addUser($username, $email, $password);
                    ?>
                    <p class="mx-auto alert alert-success col-xl-3">Vous voilà Enregistré !</p>
                    <?php
           

                }

            }
            
        }
        else echo "Le mot de passe est trop court !";
    }
    else echo "Veuillez saisir tous les champs !";
}

// }


?>


</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>