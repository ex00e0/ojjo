<?php
include "../connectdb.php";
$cat_name = isset($_POST["cat_name"])?($_POST["cat_name"]):false;
function check_error ($error) {return "<script> alert('$error'); 
    location.href='category.php'; </script>";} 
// $categories = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM category"));
// $category_id;
// foreach ($categories as $catt) {if ($catt[1]==$jew_cat) {$category_id = $catt[0];
//  echo $category_id;} }
$query_res = mysqli_query($conn, "INSERT INTO category (category_name, category_status) VALUES ('$cat_name','available')");
if ($query_res) {echo check_error("Данные обновлены!");}
else { echo check_error("Ошибка обновления!".mysqli_error($conn));}
?>