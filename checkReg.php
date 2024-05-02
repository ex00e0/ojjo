



<?
require "connectdb.php";
session_start();
$name = $_SESSION['name'];
$pass = $_SESSION['pass'];
$phone = $_SESSION['phone']; 
$queryUser = false;
$result1 = mysqli_query($conn, "SELECT * FROM users WHERE user_login = '$phone'");
$user1 = mysqli_fetch_assoc($result1);
if (!$pass || !$phone) {echo "<script>alert(\"Вы не ввели данные!\");
    location.href='catalogue.php';</script>";}
else 
if (isset($user1)) {echo "<script>alert(\"Данный номер телефона уже используется!\");
    location.href='catalogue.php';</script>";}
else {$queryUser = mysqli_query($conn, "INSERT INTO users (user_name, user_login, user_password) VALUES ('$name','$phone','$pass')");
     }

     if ($queryUser) {echo "<script>alert(\"Вы успешно зарегистрировались!\");
                                    location.href='oppo.php';</script>";}
    else {
        echo "<script>alert(\"Вы не смогли зарегистрироваться!\");
          location.href='catalogue.php';</script>";
    }
unset($_SESSION['name']);
unset($_SESSION['pass']);
unset($_SESSION['phone']);
?>