<?php
include "connectdb.php";
session_start();
$name = isset($_POST["name"])?($_POST["name"]):false;
$login = isset($_POST["login"])?($_POST["login"]):false;
$password = isset($_POST["password"])?($_POST["password"]):false;
$birth = isset($_POST["birth"])?($_POST["birth"]):false;
$id_user = $_SESSION['id'];
$new_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id_user"));
function check_error ($error) {return "<script> alert('$error'); 
    location.href='settings.php'; </script>";}    

$query_update = "UPDATE users SET ";
$check_update = false;
if ($new_info["user_name"] != $name) {$query_update .= "user_name = '$name', "; 
                                   $check_update = true;}
if ($new_info["user_login"] != $login) {$query_update .= "user_login = '$login', ";
    $check_update = true;}
if ($new_info["user_password"] != $password) {$query_update .= "user_password = '$password', ";
    $check_update = true;}
if ($new_info["user_birth"] != $birth) {$birthYear = substr($birth,6,4);  $birthMonth = substr($birth,3,2);  $birthDay = substr($birth,0,2);
    $query_update .= "user_birth = '$birthYear-$birthMonth-$birthDay', ";
        $check_update = true;}



if ($check_update) {$query_update = substr($query_update, 0, -2);
                    $query_update .= " WHERE user_id = $id_user";
                    $result = mysqli_query($conn, $query_update);
                     if ($result) {echo check_error("Данные обновлены!", $id_new);}
                     else echo check_error("Ошибка обновления!".mysqli_error($conn), $id_new);}
else {echo check_error("Данные актуальны!", $id_new);}
?>
