<?php
// Connexion à la BDD
require_once('config/functions.php');
//on démarre la session
session_start();
// $errors = [];
// on crée une vérif de champs
$errors = array();
// on verifie l'existence du champ et d'un contenu
if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {
$errors ['name'] = "vous n'avez pas renseigné votre nom";
}
if(!array_key_exists('object', $_POST) || $_POST['object'] == '') {
    $errors ['object'] = "vous n'avez pas renseigné votre nom";
    }
// on verifie existence de la clé
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
$errors ['email'] = "vous n'avez pas renseigné votre email";
}
if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
$errors ['message'] = "vous n'avez pas renseigné votre message";
}
//On check les infos transmises lors de la validation
if(!empty($errors)){
// si erreur on renvoie vers la page précédente
$_SESSION['errors'] = $errors;//on stocke les erreurs
$_SESSION['inputs'] = $_POST;
header('Location: contact.php');
}else{
    $_SESSION['success'] = 1;
    // Création des données à mettre dans le mail
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
    $to = ''; // Insérer votre adresse email ICI
    $subject = 'Message envoyé par ' . htmlspecialchars($_POST['name']) . ' ' . htmlspecialchars($_POST['object']) ;
    $message_content = '
    <table>
    <tr>
    <td><b>Emetteur du message:</b></td>
    </tr>
    <tr>
    <td>'. $subject . '</td>
    </tr>
    <tr>
    <td><b>Contenu du message:</b></td>
    </tr>
    <tr>
    <td>'. htmlspecialchars($_POST['message']) .'</td>
    </tr>
    <tr>
    <td><b>Coordonnées de contact:</b></td>
    </tr>
       <tr>
    <td>Adresse email: '.' '. htmlspecialchars($_POST['email']) . '</td>
    </tr>
    </table>
    ';
    mail($to, $subject, $message_content, $headers);
    header('Location: index.php');
}