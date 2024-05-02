<?php
require "connectdb.php";
    $phone = trim($_POST['phone']);
    $pass = trim($_POST['password']);
    $queryUser = mysqli_query($conn, "SELECT * FROM users WHERE user_login='$phone' and user_password='$pass'");
    $queryUser = mysqli_fetch_array($queryUser);
    if (!empty($queryUser["user_password"])) {
    $idUser = $queryUser["user_password"];}
    if (!empty($idUser)) {
    $name = $queryUser["user_name"];
    $login = $queryUser["user_login"];
    $pass = $queryUser["user_password"];
    $birth = $queryUser["user_birth"];
    $id = $queryUser['user_id'];
    $admin_status = $queryUser['admin_status'];}
    if(!empty($idUser) && $queryUser['block']=='unblocked'){
        // setcookie('name', $name, time() + 360000000, "/");
        // setcookie('login', $login , time() + 36000000, "/");
        // setcookie('pass', $pass ,  time() + 36000000, "/");
        // setcookie('birth', $birth ,  time() + 360000000, "/");
        // setcookie('id', $id, time() + 36000000, "/");
        session_start();
        $_SESSION['id']=$id;
        if ($admin_status == 0) {header("Location: orders.php");}
        else {header("Location: admin/index.php");}
    }
    else{ if (!empty($idUser) && $queryUser['block']=='blocked') { echo "<script>alert(\"Данный пользователь в бане!\");
        location.href='catalogue.php';
        </script>";}
        else {
        echo "<script>alert(\"Данный пользователь не найден!\");
        location.href='catalogue.php';
        </script>";}
    }
?>