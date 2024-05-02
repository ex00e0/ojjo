<?php
include "../connectdb.php";
$jew_name = isset($_POST["jew_name"])?($_POST["jew_name"]):false;
$jew_cat = isset($_POST["jew_cat"])?($_POST["jew_cat"]):false;
$jew_descr = isset($_POST["jew_descr"])?($_POST["jew_descr"]):false;
$jew_img = ($_FILES["jew_img"]["size"]!=0)?($_FILES["jew_img"]):false;
$jew_price = isset($_POST["jew_price"])?($_POST["jew_price"]):false;
function check_error ($error) {return "<script> alert('$error'); 
    location.href='index.php'; </script>";} 
// $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM category"));
// $category_id;
// foreach ($categories as $catt) {if ($catt[1]==$jew_cat) {$category_id = $catt[0];
//  echo $category_id;} }
$query_res = mysqli_query($conn, "INSERT INTO jewelery (jew_name, jew_cat, jew_descr, jew_img, jew_price, jew_status) VALUES ('$jew_name',$jew_cat,'$jew_descr','$jew_img[name]', $jew_price, 'available')");
if ($query_res) {move_uploaded_file($jew_img["tmp_name"], "../resources/$jew_img[name]");
    echo check_error("Данные обновлены!");}
else { echo check_error("Ошибка обновления!".mysqli_error($conn));}
?>