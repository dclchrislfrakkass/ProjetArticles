<?php
// Appel conexion a la base
// require_once 'inc/pdo.php';
require_once('config/functions.php');

$title = 'connexion';
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
            <input type="text" name="username" id="username" class="form-control" required/>
            <br/>
            <label>Mot de passe</label>  
            <input type="password" name="password" id="password" class="form-control" required/>
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
 * INSCRIPTION
 */
 


if (isset($_POST['register_button']))
{

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
                    echo '<div class="top mt-5>';
                    echo 'Ce nom est déjà utilisé !';
                    echo '</div>';                  
                } else {
                    // Insertion dans la base de donnée
                    // echo "<p class='mx-auto alert alert-success col-xl-3'> L'utilisateur n'existe pas !</p>";

                    addUser($username, $email, $password);
                    ?>
                    <p class="mx-auto alert alert-success col-xl-3">Vous voilà Enregistré !</p>
                    <?php
                    unset($username);
                    unset($email);
                    unset($password);

                }

            }
            
        }
        else echo "Le mot de passe est trop court !";
    }
    else echo "Veuillez saisir tous les champs !";
}
?>









<?php


if(session_status() == PHP_SESSION_NONE) {

if(isset($_POST['login_button'])) {

    /* on test si les champ sont bien remplis */
    if(!empty($_POST['username']) and !empty($_POST['password']))
    {
        // echo "je rentre ici !";
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));
        // $connect = $bd->prepare("SELECT * FROM utilisateur WHERE pseudo = :name");
        // $connect->bindParam(':name', $username);
        // $connect->execute();
        // $user = $connect->fetch();
        $verifyUser = verifyUser();

        // var_dump($user);

    /* On test si le MDP est rentré, et si les deux MDP ne sont pas différent */
    // $isPasswordCorrect = password_verify($_POST['password'], $user->password);

        if (!$verifyuser)
        {
            echo "<div class='bg-danger text-white col-12 col-xl-2 mx-auto mt-5 text-center'>Mauvais identifiant ou mot de passe !</div>";
        }
        else
        {
            if (password_verify($_POST['password'], $user->mot_de_passe)) {
                session_start();
            
                $_SESSION['auth'] = $user;
                $_SESSION['flash']['success'] = 'Vous etes maintenant bien connecté';
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



if (isset($_POST['register_button']))
{

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
                // $req = $bd->prepare("SELECT pseudo FROM utilisateur WHERE pseudo = ?");
             
                // $req->execute([$_POST['username']]);
                // $membre = $req->fetch();
               
                verifyUser($username);

                if ($username) {
                    echo '<div class="top mt-5>';
                    echo 'Ce nom est déjà utilisé !';
                    echo '</div>';
                    // echo "<script>alert(\"Utilisateur ".$username. "existe déjà\")</script>";
    
                   
                } else {
                    // Insertion dans la base de donnée
   
                    addUser($username, $email, $password);

                    // $creationUtilisateur = $bd->prepare("INSERT INTO utilisateur SET pseudo = :username, email = :email, mot_de_passe = :password, status = '0'");
                    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    // $creationUtilisateur->bindParam(':username', $_POST['username']);
                    // $creationUtilisateur->bindParam(':email', $_POST['email']);
                    // $creationUtilisateur->bindParam(':password', $password);
                    // $creationUtilisateur->execute();
                    echo "<script>alert(\"Utilisateur ".$username. " enregistré\")</script>";

                }

            }
            
        }
        else echo "Le mot de passe est trop court !";
    }
    else echo "Veuillez saisir tous les champs !";
}
?>


</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>