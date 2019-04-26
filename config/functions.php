<?php

function getArticles(){
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, title, author, stock, date FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

function getArticle($id){
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1){
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else {
        header('Location: index.php');
    }
    $req->closeCursor();
}

function addComment($articleId, $author, $comment){
    require('config/connect.php');
    $req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES (?, ?, ?, now())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}

function getComments($id){
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function addUser($username, $email, $password){
    require('config/connect.php');
    $req = $bdd->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)');
    $req->execute(array($username, $email, $password));
    $req->closeCursor();
}

// function verifyUser($username){
//     require('config/connect.php');
//     $req = $bdd->prepare("SELECT * FROM user WHERE username = ?");
//     $req->execute(array($username));
//     // $data = $req->fetchAll(PDO::FETCH_OBJ);
//     // return $data;
//     $req->closeCursor();
// }
// function verifyPass($username, $password){
//     require('config/connect.php');
//     $req = $bdd->prepare("SELECT * FROM user WHERE username = ? and password = ?");
//     $req->execute(array($username, $password));
//     // $vUser = $req->fetchAll(PDO::FETCH_OBJ);
//     $req->closeCursor();
// }

function verifyUser($username){
    require('config/connect.php');
    $req = $bdd->prepare("SELECT * FROM user WHERE username = ?");
    $req->execute(array($username));
    $user = $req->fetch();
    $req->closeCursor();
}

function getUser(){
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM user ORDER BY id DESC');
    $req->execute();
    $dUser = $req->fetchAll(PDO::FETCH_OBJ);
    return $dUser;
    $req->closeCursor();
}
