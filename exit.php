<?php 
session_start();
unset($_SESSION['id']); 
// setcookie('user', $user['id'], time() - 3600, "/");
header("Location: catalogue.php ");

 ?>