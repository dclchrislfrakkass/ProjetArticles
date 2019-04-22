<?php
// Appel conexion a la base
require_once 'inc/pdo.php';

$title = 'Gestion des membres';
ob_start();
?>

<main>
<h1 class="text-center">Gestion des membres</h1>

<?php
$req = $bd->prepare("SELECT * FROM utilisateur");
$req->execute();
?>
<table class="mm-0 ml-xl-3 col-12 col-xl-6">
<tr>
<th>Nom du membre</th>
<th>Email</th>
<th>Status</th>
<th>Effacer ?</th>
<?php
    while ($membre = $req->fetch()){
        ?>
        <!-- <li class='mt-2'> -->
        <tr>
        <?php echo "<td class=><em class='text-warning'> $membre->pseudo </em></td>"; 
        echo "<td><em> $membre->email </em></td>";
        $role = $membre->status;
        if($role == 1){
            $admin = 1;
            $sta = "<em class='text-success'>Admin</em>";
        } else {
            $admin = 0;
            $sta = "<em class='text-info'>Membre</em>";
        }
        echo "<td> $sta </div></td>";
        if($role == 1){

        } else {
            echo "<form  method='POST' id='supprime' action=''>";
            echo "<td><input class='ml-5' type='checkbox' name='$membre->pseudo' value='$membre->id_utilisateur'></td>";
        }
        
        $idUser = $membre->id_utilisateur;
        ?>
        </tr>
    <?php 
    }
    ?>
</table>
<!-- <a href="membre.php?supprime=<?= $idUser ?>">Supprimer</a> -->
<!-- <input type="submit" name="submit"> -->
</form>
<?php
if(isset($_POST[$idUser]) AND !empty($_GET[$idUser])) {
        $supprime = (int) $_GET['supprime'];
        $req = $bd->prepare('DELETE FROM utilisateur WHERE id_utilisateur = ?');
        $req->execute(array($supprime));
    }
    ?>
</main>



<?php
$content = ob_get_clean();
require 'template.php';
?>