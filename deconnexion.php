<?php

session_start();
unset($_SESSION['auth']);
unset($_SESSION['status']);
unset($_SESSION['user']);
unset($_SESSION['idMembre']);
unset($_SESSION['email']);
// session_destroy();

header('Location: index.php');
exit();
?>