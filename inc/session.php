<?php 
if (isset($_SESSION['auth'])){
$userAuth = $_SESSION['auth'];
$user = $userAuth->pseudo;
$role = $userAuth->status;
    if($role == 1){
        $admin = 1;
    } else {
        $admin = 0;
    }
}
?>