<?php
require "../connectdb.php";
$jew_id = isset($_GET['id']) ? trim($_GET['id']) :false;
$edit = isset($_GET['edit']) ? trim($_GET['edit']) :false;
$jewelery = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jewelery WHERE jew_id=$jew_id"));
$jew_cat = $jewelery['jew_cat'];
$category = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM category WHERE category_id=$jew_cat"));
if ($edit=='recover' && $category['category_status']=='deleted') {echo "<script>alert('Вы не можете восстановить товар, у которого удалена категория!');
                                                            location.href='index.php'; </script>";}
?>
<script>let edit ='<?php if ($edit) echo $edit; ?>';
if (edit=='delete') {
let answer = confirm('Вы точно хотите удалить товар?');
        if (answer) {<?php session_start(); 
                           $_SESSION['edit']=$edit; 
                           $_SESSION['jew_id']=$jew_id; 
                      ?>
                           location.href='editJewStatus.php';} 
        else {location.href='index.php';} }
else {<?php session_start(); 
            $_SESSION['edit']=$edit; 
            $_SESSION['jew_id']=$jew_id; 
        ?>
    location.href='editJewStatus.php';}
</script>  