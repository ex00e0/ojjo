<?php 
session_start();
unset($_SESSION['id']); 
unset($_SESSION['arrItems']); 
// setcookie('user', $user['id'], time() - 3600, "/");
header("Location: catalogue.php ");

 ?>