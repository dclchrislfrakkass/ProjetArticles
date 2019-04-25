<?php 
if (isset($_SESSION['auth'])){
$userAuth = $_SESSION['auth'];
$user = $userAuth->username;
$role = $userAuth->status;
    if($role == 1){
        $admin = 1;
        $sta = 'Admin';
    } else {
        $admin = 0;
        $sta = 'Membre';
    }
}
?>