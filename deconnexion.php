<?php

session_start();
unset($_SESSION['auth']);
unset($_SESSION['status']);
unset($_SESSION['user']);
unset($_SESSION['idMembre']);
// session_destroy();

header('Location: index.php');
exit();
?>