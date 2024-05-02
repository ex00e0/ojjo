<?php
include "../connectdb.php";
$idUser = $_GET['idUser'];
$block = $_GET['block'];
if ($block == 'unblocked') {mysqli_query($conn, "UPDATE users SET block = 'blocked' WHERE user_id = $idUser");}
else if ($block == 'blocked') {mysqli_query($conn, "UPDATE users SET block = 'unblocked' WHERE user_id = $idUser");}

header("Location: users.php");

?>